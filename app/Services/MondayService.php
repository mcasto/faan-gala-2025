<?php

namespace App\Services;

use Illuminate\Support\Str;

class MondayService
{
    private $token;
    private $apiUrl = 'https://api.monday.com/v2';

    /**
     * MondayService constructor.
     * Initialize API token.
     */
    public function __construct()
    {
        $this->token = env('MONDAY_API_TOKEN');
    }

    /**
     * Get headers for API request
     * @return array
     */
    private function headers(): array
    {
        return [
            'Content-Type: application/json',
            'Authorization: ' . $this->token,
            'API-Version: 2023-07'
        ];
    }

    /**
     * Get GraphQL query from file
     * @param string $queryFile
     * @return string
     */
    private function getQuery($queryFile): string
    {
        return file_get_contents(__DIR__ . '/monday-queries/' . $queryFile . '.graphql');
    }

    /**
     * Get boards from Monday.com
     *
     * @return mixed
     */
    private function getBoards(): mixed
    {
        $query = $this->getQuery('get-boards');

        $data = [
            'query' => $query
        ];

        $options = [
            'http' => [
                'method'  => 'POST',
                'header'  => implode("\r\n", $this->headers()),
                'content' => json_encode($data),
            ]
        ];

        $context  = stream_context_create($options);
        $result = file_get_contents($this->apiUrl, false, $context);

        if ($result === FALSE) {
            // Handle error
            return false;
        } else {
            return json_decode($result)->data;
        }
    }

    /**
     * Get board info with columns
     * @param int $boardId
     * @return mixed
     */
    private function getBoardInfo($boardId): mixed
    {
        $query = $this->getQuery('get-board-info');
        $query = str_replace('FIELD_ID', $boardId, $query);

        $data = [
            'query' => $query
        ];

        $options = [
            'http' => [
                'method'  => 'POST',
                'header'  => implode("\r\n", $this->headers()),
                'content' => json_encode($data),
            ]
        ];

        $context  = stream_context_create($options);
        $result = file_get_contents($this->apiUrl, false, $context);

        if ($result === FALSE) {
            // Handle error
            return false;
        } else {
            return json_decode($result)->data->boards[0];
        }
    }

    /**
     * Get board id by name
     * @param string $name
     * @return mixed
     */
    private function getBoardIdByName($name): mixed
    {
        $boards = collect($this->getBoards());

        if (!$boards) {
            return false;
        }

        // get board name
        $board = collect($boards['boards'])->firstWhere('name', 'Gala Auction Items');

        return $board ? $board->id : false;
    }

    /**
     * Add item to board
     * @param string $boardName
     * @param array $item
     * @return mixed
     */
    public function addItem($boardName, $item): mixed
    {
        $boardId = $this->getBoardIdByName($boardName);

        if (!$boardId) {
            return ['status' => 'error', 'message' => 'Board not found'];
        }

        $info = $this->getBoardInfo($boardId);

        $column_builder = collect($info->columns)
            ->map(function ($column) {
                return [
                    'id' => $column->id,
                    'field' => $column->id == 'name' ? 'id' : Str::snake($column->title)
                ];
            })
            ->filter(function ($column) use ($item) {
                return $column['field'] != 'id' && in_array($column['field'], array_keys($item));
            })
            ->toArray();

        $column_values = [];
        foreach ($column_builder as $column) {
            if ($column['field'] == 'email') {
                $column_values[$column['id']] = [
                    'email' => $item['email'],
                    'text' => $item['email']
                ];
                continue;
            }
            $column_values[$column['id']] = $item[$column['field']] ?? null;
        }

        $column_values_json = json_encode($column_values, JSON_UNESCAPED_UNICODE);
        $column_values_escaped = addslashes($column_values_json); // Escapes inner quotes for GraphQL

        // Now build the query
        $query = $this->getQuery('add-item');
        $query = str_replace('BOARD_ID', $boardId, $query);
        $query = str_replace('ITEM_NAME', '"' . $item['id'] . '"', $query);
        $query = str_replace('ITEM_COLUMN_VALUES', "\"$column_values_escaped\"", $query);

        $data = ['query' => $query];
        $options = [
            'http' => [
                'method' => 'POST',
                'header' => implode("\r\n", $this->headers()),
                'content' => json_encode($data),
            ]
        ];

        $context = stream_context_create($options);
        $result = file_get_contents($this->apiUrl, false, $context);

        // Log the final query for debugging
        logger()->debug(['result' => $result]);


        if ($result === false) {
            return [
                'status' => 'error',
                'message' => 'API connection failed',
                'error' => error_get_last()
            ];
        }

        $response = json_decode($result);

        if (isset($response->errors)) {
            return [
                'status' => 'error',
                'message' => 'Monday.com API error',
                'errors' => $response->errors,
                'query' => $query
            ];
        }

        if (!isset($response->data->create_item)) {
            return [
                'status' => 'error',
                'message' => 'Unexpected response format',
                'response' => $response
            ];
        }

        return $response->data->create_item;
    }
}

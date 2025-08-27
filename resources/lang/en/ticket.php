<?php

return [
    'form-labels' => [
        'purchaser_name' => [
            'label' => 'Purchaser Name',
            'hint' => 'You are the person ordering ticket(s)'
        ],
        'email' => [
            'label' => 'Email',
        ],
        'phone' => [
            'label' => 'Phone',
        ],
        'quantity' => [
            'label' => 'Quantity',
            'hint' => 'Number of Tickets Requested'
        ],
        'payment_methods' => [
            [
                'label' => 'Cash',
                'info' => file_get_contents(__DIR__ . '/html-blocks/ticket/cash.html'),
            ],
            [
                'label' => 'Check',
                'info' => file_get_contents(__DIR__ . '/html-blocks/ticket/check.html'),
            ],
            'label' => 'Payment Method',
            [
                'label' => 'Bank Transfer',
                'info' => file_get_contents(__DIR__ . '/html-blocks/ticket/bank-transfer.html'),
            ],
        ],
        'table_number_or_ambassador' => [
            'label' => 'Table ID or Ambassador',
            'hint' => 'Some tables have an Ambassador/Movie Theme. ID if known.'
        ],
        'vegetarian_requirement' => [
            'label' => "Vegetarian Requirement--if you're not a vegetarian, enter 'none' or leave this field blank",
            'hint' => 'The entree will be a combination of beef and chicken. If you prefer vegetarian, pleaase note your preferences/restrictions.'
        ],
        'note_from_rsvp' => [
            'label' => 'Note from RSVP',
            'hint' => 'What are you most looking forward to from this event?'
        ],
        'submit' => [
            'label' => 'Submit RSVP',
        ],
    ],
    'header' => 'Registration Form',
    'subheader' => file_get_contents(__DIR__ . '/html-blocks/ticket/subheader.html'),
    'guest-form' => [
        'name' => 'Guest Name',
        'email' => 'Guest Email',
    ],
    'additional_information' => 'Additional Information (Optional)',
    'maximum_guests' => 'Maximum number of guests reached'
];

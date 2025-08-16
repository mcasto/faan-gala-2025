<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class CleanupTempUploads extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cleanup:temp-uploads';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete temporary uploads older than 24 hours';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $directory = '/uploads';
        $storage = Storage::disk('local'); // Using the local disk (storage/app)

        $files = $storage->allFiles($directory);

        $now = Carbon::now();
        $deletedCount = 0;

        foreach ($files as $file) {
            $lastModified = Carbon::createFromTimestamp($storage->lastModified($file));

            if ($lastModified->diffInHours($now) > 24) {
                $storage->delete($file);
                $deletedCount++;
            }
        }

        $this->info("Deleted {$deletedCount} old temporary files.");
    }
}

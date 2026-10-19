<?php

declare(strict_types=1);

namespace App\Jobs;

use App\Services\DatabaseSyncService;
use Illuminate\Contracts\Queue\ShouldQueue;

class SyncDatabaseJob implements ShouldQueue
{
    use \Illuminate\Foundation\Queue\Queueable;

    public function __construct(public string $direction = 'both') {}

    public function handle(DatabaseSyncService $databaseSyncService): void
    {
        if ($this->direction === 'to-offline') {
            $databaseSyncService->syncToOffline();

            return;
        }

        if ($this->direction === 'to-online') {
            $databaseSyncService->syncToOnline();

            return;
        }

        $databaseSyncService->syncToOffline();
        $databaseSyncService->syncToOnline();
    }
}

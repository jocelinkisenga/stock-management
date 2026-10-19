<?php

declare(strict_types=1);

namespace App\Jobs;

use App\Imports\ImportUpdates;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class ImportJob implements ShouldQueue
{
    use \Illuminate\Foundation\Queue\Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(protected $filename) {}

    /** Execute the job. */
    public function handle(): void
    {
        // Excel::import(new ImportUpdates(), public_path('images/products/'.$this->filename));

        File::delete(public_path('images/products/' . $this->filename));
    }
}

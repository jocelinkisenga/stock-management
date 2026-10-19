<?php

declare(strict_types=1);

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateProductCostHistory implements ShouldQueue
{
    use \Illuminate\Foundation\Queue\Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(protected $cart_item) {}

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {}
}

<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class MyFirstJob implements ShouldQueue
{
    use Queueable;

    protected string $name;
    /**
     * Create a new job instance.
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        logger()->info("Job Listen", ['name' => $this->name]);
    }
}

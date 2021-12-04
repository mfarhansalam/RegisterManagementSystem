<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class BootcampTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'testcommand:bootcamp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'testing a test command';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->line('This is a test');
        return Command::SUCCESS;
    }
}

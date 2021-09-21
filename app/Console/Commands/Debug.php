<?php

namespace App\Console\Commands;

use App\Jobs\Dispatchers\DispatchAuthorizedTransfers;
use Illuminate\Console\Command;

class Debug extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'debug';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DispatchAuthorizedTransfers::dispatchNow();
        return 0;
    }

}

<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Mail\ExpireSoonEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SubscriptionReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscription:reminder {days}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $this->newline();
        $this->line('Processing subscription reminder among users expiring in '
            .$this->argument('days').' days.');

        $users = User::all()->filter(function($user){
            if ($user->subscription) 
                return $user->subscription->days_left == $this->argument('days');
        });

        $count = 0;
        foreach($users as $i => $user) { 
            $count++;
            $this->line( $count . ' - Sending for '. $user->name );

            $data = [
                'name' => $user->name,
                'expire_at' => $user->subscription->expire_at
            ];
            
            Mail::to($user->email)->send( new ExpireSoonEmail($data) );        
        }

        $this->newline();
        $this->line('Email reminder sent to ' . $count .' users.');
        return Command::SUCCESS;
    }
}

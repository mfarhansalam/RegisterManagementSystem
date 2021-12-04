<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Payment;
use Carbon\CarbonPeriod;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $today = Carbon::now();
        $month_ago = Carbon::now()->subDays(30);

        $period_dates = CarbonPeriod::create( $month_ago, $today );

        foreach($period_dates as $dt ) {

            echo $dt->toDateTimeString() ."\n" ;
            for($i = 0; $i < rand(0, 15); $i++) {

                $amount = rand( 1000, 20000 ) / 100;

                echo "--- sale $i -- $amount\n"; 

                Payment::create([
                    'payment_gateway' => 'securepay',
                    'order_number' => Str::random(10),
                    'amount' => $amount,
                    'transaction_data' => "{}",
                    'user_id' => rand(1, 100),
                    'status' => 'paid',
                    'created_at' => $dt->toDateTimeString() ,
                    'updated_at' => $dt->toDateTimeString() 
                ]);
            }
            echo "\n";
        }
    }
}

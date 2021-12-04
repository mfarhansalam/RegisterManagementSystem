<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Payment;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function index() {

        $today = Carbon::now();
        $month_ago = Carbon::now()->subDays(30);

        $sdb = DB::select('select 
            date_format(created_at, "%Y-%m-%d") as sale_date,
            sum(amount) as total,
            count(id) as sales
            from payments
            where created_at >= ?
            and created_at <= ?
            and status = "paid"
            group by sale_date
            order by sale_date asc
        ', [
            $month_ago->toDateString().' 00:00:00',
            $today->toDateString().' 23:59:59' 
        ]);

        $sale_list = Payment::where('created_at', '>=', $month_ago->toDateString().' 00:00:00')
            ->where('created_at', '<=', $today->toDateString().' 00:00:00')
            ->where('status', '=', 'paid')
            ->with('user')
            ->get();

        $sales_data =[];
        foreach($sdb as $sd ) {
            $sales_data[$sd->sale_date] = $sd;
        }

        $period = CarbonPeriod::create( $month_ago, $today );

        return view('admin.payment.index', [ 
            'period' => $period,
            'sales_data' => $sales_data,
            'sale_list' => $sale_list
        ]);
    }
}

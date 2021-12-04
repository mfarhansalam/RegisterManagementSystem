@extends('layout.private') 

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h1 class="h3 mb-2 text-gray-800">Maklumat Bayaran</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-body">

        <!-- <pre>
            @php var_dump( $sales_data ); @endphp
        </pre> -->

        <canvas id="myChart" height="80"></canvas>

    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header">Senarai Bayaran</div>
    <div class="card-body">

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date Time</th>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Payment Gateway</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $sale_list as $si)
                <tr>
                    <td>{{ $si->id }}</td>
                    <td>{{ $si->created_at  }}</td>
                    <td>{{ $si->user->id  }}</td>
                    <td>{{ $si->user->name  }}</td>
                    <td>{{ $si->payment_gateway }}</td>
                    <td>{{ number_format($si->amount, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>




@endsection 


@section('page-js')
<script>
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
            @foreach($period as $dt) 
            '{{ $dt->toDateString() }}',
            @endforeach
        ],
        datasets: [{
            label: 'Bayaran ikut hari',
            data: [
                @foreach($period as $dt) 
                    @if(isset($sales_data[ $dt->toDateString() ]))
                        {{ $sales_data[  $dt->toDateString() ]->total }},
                    @else 
                        0,
                    @endif
                @endforeach
            ],
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            // backgroundColor: [
            //     'rgba(255, 99, 132, 0.2)',
            //     'rgba(54, 162, 235, 0.2)',
            //     'rgba(255, 206, 86, 0.2)',
            //     'rgba(75, 192, 192, 0.2)',
            //     'rgba(153, 102, 255, 0.2)',
            //     'rgba(255, 159, 64, 0.2)'
            // ],
            borderColor: 'rgba(255, 99, 132, 1)',
            // borderColor: [
            //     'rgba(255, 99, 132, 1)',
            //     'rgba(54, 162, 235, 1)',
            //     'rgba(255, 206, 86, 1)',
            //     'rgba(75, 192, 192, 1)',
            //     'rgba(153, 102, 255, 1)',
            //     'rgba(255, 159, 64, 1)'
            // ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
@endsection
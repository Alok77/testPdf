
@extends('layouts.app2')

@section('content')

<head>
<meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Demo in Laravel 7</title>
    <meta charset="utf-8">
    <title>Charts</title>
</head>

<body>
<br><br>
<div class="container">


        <br/>
        <a href="{{ route('pdfview',['download'=>'pdf']) }}">Download PDF</a>


<table class="table table-bordered">
    <thead>
      <tr class="table-danger">
        <td>Id</td>
        <td>Name</td>
        <td>Email</td>
      </tr>
      </thead>
      <tbody>
                @foreach ($items as $key => $item)
                <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                </tr>
		@endforeach
     </tbody>
        </table>
</div>



    <h1>Chart</h1>
    <div id="container"></div>
</body>

<script src="https://code.highcharts.com/highcharts.js"></script>

<script type="text/javascript">
    var userData = <?php echo json_encode($userData)?>;

    Highcharts.chart('container', {
        title: {
            text: 'New User Registration, 2020'
        },
        subtitle: {
            text: 'Source: positronx.io'
        },
        xAxis: {
            categories: ['July', 'August', 'September',
                'October', 'November', 'December'
            ]
        },
        yAxis: {
            title: {
                text: 'Number of New Users'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'New Users',
            data: userData
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });

</script>

@endsection



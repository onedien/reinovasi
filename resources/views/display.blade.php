@extends('layout.app')

@section('title', 'Home')

@section('content')

<a href="{{route('home.create')}}"><button class="btn btn-primary mb-2">Add Data</button></a>
<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Name</th>
            <th>Gender</th>
            <th>Aktif From</th>
            <th>Aktif to</th>
        </tr>
    </thead>
    <tbody>
        @foreach($datas as $data)
            <tr>
                <td>{{ $data->name }}</td>
                <td>{{ $data->gender}}</td>
                <td>{{ $data->dateFrom}}</td>
                <td>{{ $data->dateTo}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="mb-5"></div>
<div id="container" style="width:100%; height:400px;"></div>

@push('scripts')
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<script>
     var app = @json($datas, JSON_PRETTY_PRINT);
     let count_male = 0;
     let count_female = 0;
     app.forEach(element => {
         let a = element;
         
         if(a.gender === 'male'){
            count_male++;
         }
         else if(a.gender === 'female'){
             count_female++;
         }
         console.log(count_male);
     });
document.addEventListener('DOMContentLoaded', function () {
        var myChart = Highcharts.chart('container', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Jumlah Gender'
            },
            xAxis: {
                categories: ['Male', 'Female']
            },
            yAxis: {
                title: {
                    text: 'Fruit eaten'
                }
            },
            series: [{
                name: 'Male',
                data: [count_male, 0]
            }, {
                name: 'Female',
                data: [0, count_female]
            }]
        });
    });
</script>

@endpush
@endsection

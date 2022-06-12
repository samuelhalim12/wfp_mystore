@extends('layout.conquer')
@section('content')

<div class="container">
    <h2>List Transaction</h2>
    <p>The .table-hover class enables a hover state (grey background on mouse over) on table rows:</p>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Buyer</th>
                <th>Cashier</th>
                <th>Transaction Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($listdata as $data)
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->buyer->name}}</td>
                <td>{{$data->user->name}}</td>
                <td>{{$data->transaction_date}}</td>
                @csrf
                <form method="POST">
                    <td><a class="btn btn-default" data-toggle="modal" onclick="getDetailData({{$data->id}});">Lihat Rincian Pembelian</a></td>
                </form>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    function getDetailData(id) {
        $.ajax({
            type: 'POST',
            url:'{{route("transaction.showAjax")}}',
            data: '_token=<?php echo csrf_token() ?>&id='+id,
            success: function(data) {
                $("#msg").html(data.msg);
            }
        });
    }
</script>

@endsection

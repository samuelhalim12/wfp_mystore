@extends('layout.conquer')
@section('content')
<p>No. 1 Category with no Medicine Count : {{$catWithNoMed}}</p>
<p>No. 2 Table of Category that doesn't have any medicine data</p>
<table class="table table-hover">
  <thead>
    <tr>
      <th>Category Name</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $dt)
    <tr>
      <td>{{$dt->name}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
<p>No. 3 Table of Average Price of each drug category</p>
<table class="table table-hover">
  <thead>
    <tr>
      <th>Category Name</th>
      <th>Average Price</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data3 as $dt)
    <tr>
      <td>{{$dt->name}}</td>
      @if($dt->average == null)
      <td>0</td>
      @else
      <td>{{$dt->average}}</td>
      @endif
    </tr>
    @endforeach
  </tbody>
</table>
<p>No. 4 Medicine Category that have only 1 medicine product: {{$data4[0]->name}}</p>
<p>No. 5 Medicine that have only 1 form:</p>
<table class="table table-hover">
  <thead>
    <tr>
      <th>Medicine Name</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data5 as $dt)
    <tr>
      <td>{{$dt->generic_name}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
<p>No. 6 Display category and name of medicine that has highest price:</p>
<table class="table table-hover">
  <thead>
    <tr>
      <th>Category</th>
      <th>Medicine Name</th>
      <th>Price</th>
    </tr>
  </thead>
  <tbody>
    <td>{{$data6->name}}</td>
    <td>{{$data6->generic_name}}</td>
    <td>{{$data6->price}}</td>
  </tbody>
</table>
@endsection
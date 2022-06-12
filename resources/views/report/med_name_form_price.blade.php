@extends('layout.conquer')
@section('content')
<div class="container">
  <h2>List Medicines</h2>
  <p>The .table-hover class enables a hover state (grey background on mouse over) on table rows:</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Generic Name</th>
        <th>Form</th>
        <th>Restriction Formula</th>
        <th>Price</th>
      </tr>
    </thead>
    
    <tbody>
        @foreach($data as $dt)
      <tr>
        <td>{{$dt->generic_name}}</td>
        <td>{{$dt->form}}</td>
        <td>{{$dt->restriction_formula}}</td>
        <td>{{$dt->price}}</td>
      </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection
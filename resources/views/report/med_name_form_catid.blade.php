@extends('layout.conquer')
@section('content')

<div class="container">
  <h2>List Medicines</h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Generic Name</th>
        <th>Form</th>
        <th>Restriction Formula</th>
        <th>Category Names</th>
      </tr>
    </thead>

    <tbody>
      @foreach($data as $dt)
      <tr>
        <td>{{$dt->generic_name}}</td>
        <td>{{$dt->form}}</td>
        <td>{{$dt->restriction_formula}}</td>
        <td>{{$dt->name}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

</div>
@endsection
@extends('layout.conquer')
@section('content')
<form method="POST" action="{{route('kategori_obat.store')}}">
    @csrf
  <div class="form-group">
    <label for="inputName">Name</label>
    <input type="text" class="form-control" id="inputName" name="name" aria-describedby="emailHelp" placeholder="Enter Category Name">
  </div>
  <div class="form-group">
    <label for="inputDescription">Description</label>
    <input type="text" class="form-control" id="inputDescription" name="description" placeholder="Description">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
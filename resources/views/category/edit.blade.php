@extends('layout.conquer')
@section('content')
<form method="POST" action="{{url('kategori_obat/'.$data->id)}}">
    @csrf
    @method("PUT")
  <div class="form-group">
    <label for="inputName">Name</label>
    <input type="text" class="form-control" id="inputName" name="name" aria-describedby="emailHelp" placeholder="Enter Category Name" value="{{$data->name}}">
  </div>
  <div class="form-group">
    <label for="inputDescription">Description</label>
    <input type="text" class="form-control" id="inputDescription" name="description" placeholder="Description" value="{{$data->description}}">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
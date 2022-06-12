@extends('layout.conquer')
@section('content')
<form method="POST" action="{{route('kategori_obat.store')}}">
    @csrf
    <div class="form-group">
        <label for="inputName">Generic Name</label>
        <input type="text" class="form-control" id="inputName" name="generic_name" aria-describedby="emailHelp" placeholder="Enter Medicine's Name">
    </div>
    <div class="form-group">
        <label for="inputDescription">Form</label>
        <input type="text" class="form-control" id="inputDescription" name="form" placeholder="Form">
    </div>
    <div class="form-group">
        <label for="inputDescription">Restriction Formula</label>
        <input type="text" class="form-control" id="inputDescription" name="restriction_formula" placeholder="Restriction Formula">
    </div>
    <div class="form-group">
        <label for="inputDescription">Price</label>
        <input type="number" class="form-control" id="inputDescription" name="price" placeholder="Price">
    </div>
    <div class="form-group">
        <label for="inputDescription">Description</label>
        <input type="text" class="form-control" id="inputDescription" name="description" placeholder="Description">
    </div>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="tk1">
        <label class="form-check-label" for="exampleCheck1">Faskes 1</label>
    </div>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="tk2">
        <label class="form-check-label" for="exampleCheck1">Faskes 2</label>
    </div>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="tk3">
        <label class="form-check-label" for="exampleCheck1">Faskes 3</label>
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Example select</label>
        <select class="form-control" id="exampleFormControlSelect1" name="category_id">
            @foreach ($collection as $item)
            <option>{{$item->name}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
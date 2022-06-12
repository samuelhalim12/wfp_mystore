<form method="POST" action="{{url('kategori_obat/'.$data->id)}}">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Add New Category</h4>
    </div>
    <div class="modal-body">

        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="inputName">Generic Name</label>
            <input type="text" class="form-control" id="inputName" name="name" placeholder="Name" value="{{$data->name}}">
        </div>
        <div class="form-group">
            <label for="inputDescription">Description</label>
            <input type="text" class="form-control" id="inputDescription" name="description"
                placeholder="Description" value="{{$data->description}}">
        </div>
        {{-- <div class="form-group">
            <label for="exampleFormControlSelect1">Example select</label>
            <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                @foreach ($collection as $item)
                <option>{{$item->name}}</option>
                @endforeach
            </select>
        </div> --}}


    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
    </div>
</form>

@extends('layout.conquer')
@section('content')
    <div class="page-toolbar">
        <a href="{{ url('kategori_obat/create') }}" class="btn btn-info"> + Kategori Baru</a>
        <a href="#modalCreate" data-toggle='modal' class="btn btn-info">+ Kategori With Modal</a>
    </div>

    <div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('kategori_obat.store') }}">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Add New Category</h4>
                    </div>
                    <div class="modal-body">

                        @csrf
                        <div class="form-group">
                            <label for="inputName">Name</label>
                            <input type="text" class="form-control" id="inputName" name="name"
                                aria-describedby="emailHelp" placeholder="Category Name">
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Description</label>
                            <input type="text" class="form-control" id="inputDescription" name="description"
                                placeholder="Description">
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
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEdit" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id='modalContent'>
                <div style="text-align:center">
                    <img src="{{ asset('assets/img/loading.gif') }}" alt="Loading...">
                </div>
            </div>
        </div>
    </div>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="container">
        <h2>List Category</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $dt)
                    <tr id='tr_{{ $dt->id }}'>
                        <td>{{ $dt->id }}</td>
                        <td id="td_name_{{ $dt->id }}">{{ $dt->name }}</td>
                        <td id="td_description_{{ $dt->id }}">{{ $dt->description }}</td>
                        <td>
                            <a href="{{ url('kategori_obat/' . $dt->id . '/edit') }}" class='btn btn-xs btn-info'>
                                Edit
                            </a>
                            <a href="#modalEdit" data-toggle="modal" class="btn btn-xs btn-info"
                                onclick="getEditForm({{ $dt->id }})">Edit A</a>
                            <a href="#modalEdit" data-toggle="modal" class="btn btn-xs btn-info"
                                onclick="getEditForm2({{ $dt->id }})">Edit B</a>
                            <form method='POST' action="{{ url('kategori_obat/' . $dt->id) }}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="delete" class="btn btn-danger btn-xs"
                                    onclick="if(!confirm('are you sure to delete this record?')) return false;" />
                                <a class='btn btn-xs btn-danger'
                                    onclick="if(confirm('are you sure to delete this record?')) deleteDataRemoveTR({{ $dt->id }})">
                                    delete 2</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
@section('javascript')
    <script>
        function getEditForm(id) {
            $.ajax({
                type: 'POST',
                url: '{{ route('category.getEditForm') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id
                },
                success: function(data) {
                    $('#modalContent').html(data.msg)
                }
            });
        }

        function getEditForm2(id) {
            $.ajax({
                type: 'POST',
                url: '{{ route('category.getEditForm2') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id
                },
                success: function(data) {
                    $('#modalContent').html(data.msg)
                }
            });
        }

        function saveDataUpdateTD(id) {
            var inputName = $('#eName').val();
            var inputDescription = $('#eDescription').val();
            // console.log(inputName);
            // console.log(inputDescription);
            $.ajax({
                type: 'POST',
                url: '{{ route('category.saveData') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id,
                    'name': inputName,
                    'description': inputDescription
                },
                success: function(data) {
                    if (data.status == 'oke') {
                        $('#td_name_' + id).html(inputName);
                        $('#td_description_' + id).html(inputDescription);
                        alert(data.msg);
                        // $('#pesan').show();
                        // $('#pesan').html(data.msg);
                    }
                    // $('#modalContent').html(data.msg)
                }
            });
        }

        function deleteDataRemoveTR(id) {
            $.ajax({
                type: 'POST',
                url: '{{ route('category.deleteData') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id
                },
                success: function(data) {
                    if (data.status == 'oke') {
                       alert(data.msg);
                       $( '#tr_' + id ).remove();
                    } else {
                        alert(data.msg);
                    }
                    // $('#modalContent').html(data.msg)
                }
            });
        }
    </script>
@endsection

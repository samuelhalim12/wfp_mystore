@extends('layout.conquer')
@section('content')

<a class="btn btn-default" data-toggle="modal" href="#disclaimer">Disclaimer</a>
<div class="modal fade" id="disclaimer" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">DISCLAIMER</h4>
      </div>
      <div class="modal-body">
        Pictures shown are for illustration purpose only.Actual product may vary due to product enhancement.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <h2>List Medicines</h2>
  <p>The .table-hover class enables a hover state (grey background on mouse over) on table rows:</p>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Generic Name</th>
        <th>Form</th>
        <th>Restriction Formula</th>
        <th>Description</th>
        <th>TK1</th>
        <th>TK2</th>
        <th>TK3</th>
        <th>Category</th>
      </tr>
    </thead>
    <tbody>
      @foreach($listdata as $data)
      <tr>
        <td>
          <a class='btn btn-info' href="{{route('medicine.show',$data->id)}}" data-target="#show{{$data->id}}" data-toggle='modal'>{{$data->id}}</a>
          <div class="modal fade" id="show{{$data->id}}" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <!-- put animated gif here -->
              </div>
            </div>
          </div>
        </td>
        <td>{{$data->generic_name}}</td>
        <td>{{$data->form}}</td>
        <td>{{$data->restriction_formula}}</td>
        <td>{{$data->description}}</td>
        <td>{{$data->faskes1}}</td>
        <td>{{$data->faskes2}}</td>
        <td>{{$data->faskes3}}</td>
        <td>{{$data->category_id}}</td>
        <td>
          <a class="btn btn-default" data-toggle="modal" href="#detail_{{$data->id}}" data-toggle="modal">{{ $data->generic_name }}</a>

          <div class="modal fade" id="detail_{{$data->id}}" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">{{$data->generic_name}}</h4>
                </div>
                <div class="modal-body">
                  <img src="{{ asset('storage/img') }}/product{{$data->id}}.jpg" height='200px' />
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </td>

      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="page-toolbar">
    <a href="{{url('medicine/create')}}" class="btn btn-info" type="button"> +Medicine Baru</a>
  </div>
</div>

@endsection
@section('javascript')
<script>
  function showInfo() {
    $.ajax({
      type: 'POST',
      url: '{{route("medicines.showInfo")}}',
      data: {'_token':'<?php echo csrf_token() ?>'},
      success: function(data) {
        $('#showinfo').html(data.msg)
      }
    });
  }
  function showHighestPrice() {
    $.ajax({
      type: 'POST',
      url: '{{route("medicines.showHighestPrice")}}',
      data: {'_token':'<?php echo csrf_token() ?>'},
      success: function(data) {
        $('#showinfo').html(data.msg)
      }
    });
  }
</script>
@endsection

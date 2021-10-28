@extends('layouts.layouts_admin')
@section('content_admin')
@if($errors->any())
<div>
            <ul>
                @foreach($errors->all() as $error)
                  {{$error}}
                @endforeach
            </ul>
        </div>

    @endif
  <div class="modal-dialog" style="margin-left: 150px; margin-top: 0px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create</h5>
      </div>
      <div class="modal-body">
        <form id="AddForm" action="{{route('Admin/sohuu.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="name-adress">Tên nhà vận hành:</label>
                <input type="text" class="form-control" id="tenchusohuu" name="tenchusohuu">
            </div>
            <button type="submit" class="btn-btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
@endsection
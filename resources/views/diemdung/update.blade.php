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
        <h5 class="modal-title" id="exampleModalLabel">Update</h5>
      </div>
      <div class="modal-body">
        <form id="AddForm" action="{{route('Admin/diemdung.update',$diemdung->id)}}" method="post">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name-adress">Tên địa điểm:</label>
                <input type="text" class="form-control" id="tendiadiem" name="tendiadiem" value="{{$diemdung->tendiadiem}}">
            </div>
            <div class="form-group">
                <label for="sodienthoai">Lat:</label>
                <input type="text" class="form-control" id="lat" name="lat" value="{{$diemdung->lat}}">
            </div>
            <div class="form-group">
                <label for="email">Lng:</label>
                <input type="text" class="form-control" name="lng" id="lng" value="{{$diemdung->lng}}">
            </div>
            <div class="form-group">
                <fieldset>
                    <label for="cactuyen">Các tuyến đi qua:</label>
                    @foreach($bus as $b)
                        <input type="checkbox" name="cactuyen[]" value="{{$b->tenxe}}"
                        @foreach($diemdung->cactuyen as $ct) 
                        @if($b->tenxe==$ct)
                        checked = "checked"
                        @endif
                        @endforeach>{{$b->tenxe}}
                    @endforeach
                    </label>
                </fieldset>
            </div>
            <button type="submit" class="btn-btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
@endsection
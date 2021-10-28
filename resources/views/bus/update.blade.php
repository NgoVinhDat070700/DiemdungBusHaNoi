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
        <h5 class="modal-title" id="">Update</h5>
      </div>
      <div class="modal-body">
        <form id="AddForm" action="{{route('Admin/bus.update',$bus->id)}}" method="post">
        @method("PUT")
            @csrf
            <div class="form-group">
                <label for="name-adress">Tên tuyến xe:</label>
                <input type="text" class="form-control" id="tenxe" name="tenxe" value="{{$bus->tenxe}}">
            </div>
            <div class="form-group">
                <label for="sodienthoai">Điểm đầu:</label>
                <input type="text" class="form-control" id="diemdau" name="diemdau" value="{{$bus->diemdau}}">
            </div>
            <div class="form-group">
                <label for="email"> Điểm cuối:</label>
                <input type="text" class="form-control" name="diemcuoi" id="diemcuoi" value="{{$bus->diemcuoi}}">
            </div>
            <div class="form-group">
                <td for="">ID Nhà vận hành:</td>
                <td>
                <select id="id_sohuu" name="id_sohuu" style="width:200px;height:30px;"> <br> <br>
                    @foreach($sohuu as $sh)     
                    <option value="{{$sh->id}}" @if($bus->id_sohuu==$sh->id)
                    selected = "selected"
                    @endif>{{$sh->tenchusohuu}}</option>
                    @endforeach
                </select>
                </td>
            </div>
            <button type="submit" class="btn-btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
@endsection
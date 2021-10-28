@extends('layouts.layouts_admin')
@section('content_admin')
<section style="padding-top:60px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-hearder">
                            Danh sách tuyến bus <a href="{{route('Admin/bus.create')}}" class="btn btn-success">Thêm mới</a>
                        </div>
                        <div class="card-body">
                            <table id="studentTable" class="table">
                                <thead>
                                    <th>Tên tuyến xe</th>
                                    <th>Điểm đầu</th>
                                    <th>Điểm cuối</th>
                                    <th>ID Nhà vận hành</th>
                                    <th>Thao tác</th>
                                </thead>
                                <tbody>
                                    @foreach($bus as $b)
                                        <tr>
                                            <td>{{$b->tenxe}}</td>
                                            <td>{{$b->diemdau}}</td>
                                            <td>{{$b->diemcuoi}}</td>
                                            <td>{{$b->id_sohuu}}</td>
                                            <td>
                                                <a href="{{route('Admin/bus.edit',$b->id)}}" class="btn btn-info">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

@endsection
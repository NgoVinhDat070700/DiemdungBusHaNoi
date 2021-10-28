@extends('layouts.layouts_admin')
@section('content_admin')
<section style="padding-top:60px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-hearder">
                            Danh sách tuyến bus <a href="{{route('Admin/diemdung.create')}}" class="btn btn-success">Thêm mới</a>
                        </div>
                        <div class="card-body">
                            <table id="studentTable" class="table">
                                <thead>
                                    <th>Tên địa điểm</th>
                                    <th>Lat</th>
                                    <th>Lng</th>
                                    <th>Các tuyến</th>
                                    <th>Thao tác</th>
                                </thead>
                                <tbody>
                                    @foreach($diemdung as $dd)
                                        <tr>
                                            <td>{{$dd->tendiadiem}}</td>
                                            <td>{{$dd->lat}}</td>
                                            <td>{{$dd->lng}}</td>
                                            <td style="display: flex;">
                                            @foreach($dd->cactuyen as $ct)
                                                <p style="margin-left: 10px;border: 1px solid #000;">{{$ct}}</p>
                                            @endforeach
                                            </td>
                                            <td>
                                                <a href="{{route('Admin/diemdung.edit',$dd->id)}}" class="btn btn-info">Edit</a>
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
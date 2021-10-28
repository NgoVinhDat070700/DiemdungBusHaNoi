@extends('layouts.layouts_admin')
@section('content_admin')
<section style="padding-top:60px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-hearder">
                            Nhà vận hành <a href="{{route('Admin/sohuu.create')}}" class="btn btn-success">Thêm mới</a>
                        </div>
                        <div class="card-body">
                            <table id="studentTable" class="table">
                                <thead>
                                    <th>Tên chủ sở hữu</th>
                                    <th>Thao tác</th>
                                </thead>
                                <tbody>
                                    @foreach($sohuu as $sh)
                                        <tr>
                                            <td>{{$sh->tenchusohuu}}</td>
                                            <td>
                                                <a href="{{route('Admin/sohuu.edit',$sh->id)}}" class="btn btn-info">Edit</a>
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
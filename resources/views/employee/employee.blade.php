@extends('layouts.master')
@section('content')

    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content">
        <!-- PAGE TITLE -->
        <div class="page-title">
            <h2><span class="fa fa-users"></span> QUẢN LÝ: <small> <span style="color: red;"><?php echo $emp; ?> </span> nhân viên</small></h2>
        </div>
        <!-- END PAGE TITLE -->
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-default">
                    <div class="panel-body">
                        <p>Tìm kiếm thông tin nhân viên</p>
                        <form class="form-horizontal">
                            <div class="form-group">
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-search"></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Who are you looking for?"/>
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-success btn-block"><span class="fa fa-plus"></span> Add new contact</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            @foreach($getEmployee as $list)
            <div class="col-md-3" onclick="location.href='{{route('detailEmployee', $list->MaNV)}}';" style="cursor: pointer">
                <!-- CONTACT ITEM -->
                <div class="panel panel-default">
                    <div class="panel-body profile">
                        <div class="profile-image">
                            @if($list->GioiTinh == 0)
                            <img src="{{ URL::asset('public/csrs-admin-template/assets/employees/employee_woman.png')}}" alt="Nadia Ali"/>
                            @elseif ($list->GioiTinh == 1)
                            <img src="{{ URL::asset('public/csrs-admin-template/assets/employees/employee_man.png')}}" alt="Nadia Ali"/>
                            @endif
                        </div>
                        <div class="profile-data">
                            <div class="profile-data-name">{{$list->HoTen}}</div>
                            <div class="profile-data-title">{{$list->ChucVu}}</div>
                        </div>
                        <div class="profile-controls">
                            <a href="#" class="profile-control-left"><span class="fa fa-info"></span></a>
                            <a href="#" class="profile-control-right"><span class="fa fa-phone"></span></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="contact-info">
                            <p><small>Số điện thoại</small><br/>{{$list->SDT}}</p>
                            <p><small>Email</small><br/>{{$list->Email}}</p>
                            <p><small>Địa chỉ</small><br/>{{$list->DiaChi}}</p>
                            <p><small>Ngày sinh</small><br/>{{$list->NgaySinh}}</p>
                            {{--<p><small>Giới tính</small><br/>@if($list->GioiTinh == 0) Nữ @elseif ($list->GioiTinh == 1) Nam @endif</p>--}}
                        </div>
                    </div>
                </div>
                <!-- END CONTACT ITEM -->
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul class="pagination pagination-sm pull-right push-down-10 push-up-10">
                    <li class="disabled"><a href="#">«</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">»</a></li>
                </ul>
            </div>
        </div>

    </div>
    <!-- END PAGE CONTENT WRAPPER -->
@endsection
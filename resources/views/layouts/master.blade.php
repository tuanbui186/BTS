<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>CSRS Admin - Responsive Bootstrap Admin Template</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="{{ URL::asset('public/csrs-admin-template/css/theme-default.css')}}"/>
        <!-- EOF CSS INCLUDE -->

    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="{{route('getDashboard')}}">CSRS Admin</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="{{ URL::asset('public/csrs-admin-template/assets/images/users/avatar.jpg')}}" alt="John Doe"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="{{ URL::asset('public/csrs-admin-template/assets/images/users/user-admin.png')}}" alt="John Doe"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name">Admin</div>
                                <div class="profile-data-title"></div>
                            </div>
                            <div class="profile-controls">
                                <a href="#" class="profile-control-left"><span class="fa fa-info"></span></a>
                                <a href="#" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                            </div>
                        </div>                                                                        
                    </li>
                    <li class="xn-title">CHỨC NĂNG CHÍNH</li>
                    <li class="active">
                        <a href="{{route('getDashboard')}}"><span class="fa fa-desktop"></span> <span class="xn-text">Trang chủ</span></a>
                    </li>                    
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Quản lý</span></a>
                        <ul>
                            <!-- <li><a href="pages-gallery.html"><span class="fa fa-image"></span> Gallery</a></li> -->
                            <li><a href="{{route('getEmployeeManager')}}"><span class="fa fa-users"></span> Quản lý nhân viên</a></li>
                            <li><a href="{{URL::to('/developing')}}"><span class="fa fa-user"></span> Quản lý khách hàng</a></li>
                            <!-- <li class="xn-openable">
                                <a href="#"><span class="fa fa-envelope"></span> Mailbox</a>
                                <ul>
                                    <li><a href="pages-mailbox-inbox.html"><span class="fa fa-inbox"></span> Inbox</a></li>
                                    <li><a href="pages-mailbox-message.html"><span class="fa fa-file-text"></span> Message</a></li>
                                    <li><a href="pages-mailbox-compose.html"><span class="fa fa-pencil"></span> Compose</a></li>
                                </ul>
                            </li>
                            <li><a href="pages-messages.html"><span class="fa fa-comments"></span> Messages</a></li> -->

                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">Thống kê</span></a>
                        <ul>
                            <li><a href="{{route('getEmployeeAttendance')}}"><span class="fa fa-calendar"></span> Lịch làm việc</a></li>
                            <li><a href="{{URL::to('/developing')}}">Thống kê giao dịch</a></li>
                            <li><a href="{{URL::to('/developing')}}">Thống kê đánh gía nhân viên</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
             @yield('content')
            </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Bạn có chắc chắn đăng xuất hay không?</p>                    
                        <p>Nhấn <b>Không</b> nếu bạn muốn tiếp tục ở lại. Nhấn <b>Có</b> để đăng xuất tài khoản hiện tại</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="{{URL::to('/')}}" class="btn btn-success btn-lg">Có</a>
                            <button class="btn btn-default btn-lg mb-control-close">Không</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="{{ URL::asset('public/csrs-admin-template/audio/alert.mp3')}}" preload="auto"></audio>
        <audio id="audio-fail" src="{{ URL::asset('public/csrs-admin-template/audio/fail.mp3')}}" preload="auto"></audio>
        <!-- END PRELOADS -->                  
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="{{ URL::asset('public/csrs-admin-template/js/plugins/jquery/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('public/csrs-admin-template/js/plugins/jquery/jquery-ui.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('public/csrs-admin-template/js/plugins/bootstrap/bootstrap.min.js') }}"></script>        
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type="text/javascript" src="{{ URL::asset('public/csrs-admin-template/js/plugins/icheck/icheck.min.js') }}"></script>        
        <script type="text/javascript" src="{{ URL::asset('public/csrs-admin-template/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('public/csrs-admin-template/js/plugins/scrolltotop/scrolltopcontrol.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('public/csrs-admin-template/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>

        <script type="text/javascript" src="{{ URL::asset('public/csrs-admin-template/js/plugins/morris/raphael-min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('public/csrs-admin-template/js/plugins/morris/morris.min.js') }}"></script>       
        <script type="text/javascript" src="{{ URL::asset('public/csrs-admin-template/js/plugins/rickshaw/d3.v3.js')}}"></script>
        <script type="text/javascript" src="{{ URL::asset('public/csrs-admin-template/js/plugins/rickshaw/rickshaw.min.js') }}"></script>
        <script type='text/javascript' src="{{ URL::asset('public/csrs-admin-template/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
        <script type='text/javascript' src="{{ URL::asset('public/csrs-admin-templatejs/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>                
        <script type='text/javascript' src="{{ URL::asset('public/csrs-admin-template/js/plugins/bootstrap/bootstrap-datepicker.js') }}"></script>                
        <script type="text/javascript" src="{{ URL::asset('public/csrs-admin-template/js/plugins/owl/owl.carousel.min.js') }}"></script>                 
        
        <script type="text/javascript" src="{{ URL::asset('public/csrs-admin-template/js/plugins/moment.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('public/csrs-admin-template/js/plugins/daterangepicker/daterangepicker.js') }}"></script>
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="{{ URL::asset('public/csrs-admin-template/js/settings.js') }}"></script>
        
        <script type="text/javascript" src="{{ URL::asset('public/csrs-admin-template/js/plugins.js') }}"></script>        
        <script type="text/javascript" src="{{ URL::asset('public/csrs-admin-template/js/actions.js') }}"></script>
        
        <script type="text/javascript" src="{{ URL::asset('public/csrs-admin-template/js/demo_dashboard.js') }}"></script>
        <!-- END TEMPLATE -->
        <script type='text/javascript' src="{{ URL::asset('public/csrs-admin-template/js/plugins/icheck/icheck.min.js')}}"></script>
        <script type="text/javascript" src="{{ URL::asset('public/csrs-admin-template/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>

        <script type="text/javascript" src="{{ URL::asset('public/csrs-admin-template/js/plugins/moment.min.js')}}"></script>
        <script type="text/javascript" src="{{ URL::asset('public/csrs-admin-template/js/plugins/fullcalendar/fullcalendar.min.js')}}"></script>
    <!-- END SCRIPTS -->         
    </body>
</html>
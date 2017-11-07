@extends('layouts.master')
@section('content')
    <!-- PAGE CONTENT -->
<script src="{{ URL::asset('public/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{ URL::asset('public/js/highcharts.js')}}"></script>
<script src="{{ URL::asset('public/js/highcharts-more.js')}}"></script>
<script src="{{ URL::asset('public/js/exporting.js')}}"></script>
    <!-- PAGE CONTENT -->

    <div class="page-content">
        <h2 style="text-align: center" id="nameEmployee"> </h2>
      <!-- Chart -->
        <div id="container"></div>
        <div class="row">
            <div style="text-align: center">
                <button class="btn btn-primary" id="plain">Biểu đồ cột dọc</button>
                <button class="btn btn-danger" id="inverted">Biểu đồ cột ngang</button>
                <button class="btn btn-default" id="polar">Biểu đồ tròn</button>
            </div>
        </div>
        <!-- PAGE attendance-->
        <div class="page-content-wrap">
            <div class="row">
                <div class="col-md-12">
                    <!-- START DEFAULT DATATABLE -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Tính chuyên cần nhân viên</h3>
                            <ul class="panel-controls">
                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <table class="table datatable">
                                <thead>
                                <tr>
                                    <th>Thời điểm đi làm</th>
                                    <th>Thời điểm ra về</th>
                                    <th>Địa chỉ MAC</th>
                                    <th>Địa chỉ IP</th>
                                </tr>
                                </thead>
                                <tbody id="tbAttend">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END DEFAULT DATATABLE -->
                </div>
            </div>
        </div>
        <!-- PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->
<script>
    var url = window.location.pathname;
    var id = url.substring(url.lastIndexOf('/') + 1);
    getChartAverageScore();
    getAttendanceEmployee();
    getInfoEmployee();
//    setInterval(getChartAverageScore, 15000);
//    setInterval(getAttendanceEmployee, 15000);
    function getChartAverageScore() {
            var url = '../get-chart-average-score';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                type:'GET',
                data: {employeeId: id},
                dataType : 'JSON',
                success: function(data){
                    if(data != null) {
//                        alert(JSON.stringify(data));
                        var chart = Highcharts.chart('container', {

                            title: {
                                text: 'ĐIỂM ĐÁNH GIÁ TRUNG BÌNH THEO THÁNG'
                            },

                            subtitle: {
                                text:""
                            },

                            xAxis: {
                                categories: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12']
                            },

                            series: [{
                                type: 'column',
                                colorByPoint: true,
                                data: data,
                                showInLegend: false
                            }]
                        });


                        $('#plain').click(function () {
                            chart.update({
                                chart: {
                                    inverted: false,
                                    polar: false
                                },
                                subtitle: {
                                    text: 'Plain'
                                }
                            });
                        });

                        $('#inverted').click(function () {
                            chart.update({
                                chart: {
                                    inverted: true,
                                    polar: false
                                },
                                subtitle: {
                                    text: 'Inverted'
                                }
                            });
                        });

                        $('#polar').click(function () {
                            chart.update({
                                chart: {
                                    inverted: false,
                                    polar: true
                                },
                                subtitle: {
                                    text: 'Polar'
                                }
                            });
                        });
                    }
                    else {
                        alert("Không có dữ liệu");
                    }
                },
                error: function(){
                    alert("Lỗi lấy biểu đồ");
                }
            });
    }
    function getAttendanceEmployee(){
        var url = '../get-attendance-employee';
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url,
            type:'GET',
            data: {employeeId: id},
            dataType : 'JSON',
            success: function(data){
            $('#tbAttend').empty();
                $.each (data, function (key, item) {
                    var html =  "<tr>"+
                                "<td>"+convertTime(item['ThoiDiemDN'])+"</td>" +
                                "<td>"+convertTime((item['ThoiDiemDX']))+"</td>" +
                                "<td>"+item['MAC']+"</td>" +
                                "<td>"+item['IP']+"</td>" +
                                "</tr>";
                    $("#tbAttend").append(html);
                });
//                $("#tbAttend").DataTable();
            },
            error: function(){
                alert("Không lấy được thông tin nhân viên");
            }
        });
    }
    function convertTime(datetime){
        var date = new Date(Date.parse(datetime));
        var hours = "0" + date.getHours();
        var minutes = "0" + date.getMinutes();
        var seconds = "0" + date.getSeconds();
        var d = date.getDate();
        var m = date.getMonth() + 1;
        var y = date.getFullYear();
        var timerp = hours.substr(-2) + ':' + minutes.substr(-2) + ':' + seconds.substr(-2);
        var daterp = d + '/' + m + '/' + y;
        var newDateTime = timerp + ', ' + daterp;
        return newDateTime;
    }
    function getInfoEmployee(){
        var url = '../get-Info-Employee';
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url,
            type:'GET',
            data: {employeeId: id},
            dataType : 'JSON',
            success: function(data){
                if(data != null) {
//                        alert(JSON.stringify(data));
                    $.each (data, function (key, item) {
                        $('#nameEmployee').text(item['HoTen']);
                    });
                }
                else {
                    alert("Không có dữ liệu");
                }
            },
            error: function(){
                alert("Lỗi lấy biểu đồ");
            }
        });
    }
</script>
@endsection
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $emp = \DB::table('nhan_vien')->count();
        $getEmployee = \DB::table('nhan_vien')->get();
        return view('employee.employee', compact('emp', 'getEmployee'));
    }

    public function employeeAttendance()
    {
        return view('employee.employeeAttendance');
    }

    public function detailEmployee(Request $request)
    {
        return view('employee.detailEmployee');
    }

    public function getChartAverageScore(Request $request)
    {
        if (\Request::ajax()) {
            $avgScoreArr = array();
            $sqlQuery = "select MONTH(danh_gia.ThoiDiemDG) as month, AVG(DiemDG) as avg from nhan_vien INNER JOIN giao_dich ON nhan_vien.MaNV = giao_dich.MaNV INNER JOIN danh_gia ON giao_dich.MaGD = danh_gia.MaGD where nhan_vien.MaNV = '" . $request->employeeId . "' GROUP BY MONTH(danh_gia.ThoiDiemDG)";
            $avgScore = \DB::select(\DB::raw($sqlQuery));
            for ($i = 0; $i < 12; $i++) {
                array_push($avgScoreArr,  0);
                foreach ($avgScore as $value) {
                    if (($i+1) == (int)$value->month) {
                        $avgScoreArr[$i] = (float)$value->avg;
                    }
                }
            }
            return json_encode($avgScoreArr);
        }
    }

    public function getInfoEmployee(Request $request)
    {
        if (\Request::ajax()) {
            $sqlQuery = "select * from nhan_vien where nhan_vien.MaNV = '" . $request->employeeId . "'";
            $employee = \DB::select(\DB::raw($sqlQuery));
        }
        return json_encode($employee);
    }
    public function getAttendanceEmployee(Request $request){
        if (\Request::ajax()) {
            $sqlQuery = "SELECT * FROM dang_nhap WHERE MaNV = '" . $request->employeeId . "'";
            $attendEmpl = \DB::select(\DB::raw($sqlQuery));

            return json_encode($attendEmpl);
        }
    }
}

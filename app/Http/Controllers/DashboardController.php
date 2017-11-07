<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

    	$emp = \DB::table('nhan_vien')->count();
    	$trans = \DB::table('giao_dich')->count();
        $avgEval = \DB::table('danh_gia')->avg('DiemDG');
        $avgEvalToday = \DB::table('giao_dich')->select(\DB::raw('*'))
            ->whereRaw('Date(ThoiDiemKTGD) = CURDATE()')->get();
        $vote = \DB::table('danh_gia')->count();
        $timeService = \DB::table('giao_dich')->select('ThoiDiemBDGD', 'ThoiDiemKTGD')->get();

        $timePeriod = array();
        foreach($timeService as $list) {
            array_push($timePeriod, strtotime($list->ThoiDiemKTGD) - strtotime($list->ThoiDiemBDGD));
        }
        $avgTimePeriod = number_format(array_sum($timePeriod)/$trans, 2);
    	return view('dashboard', compact('emp','trans', 'avgEval', 'avgEvalToday', 'vote', 'avgTimePeriod'));
    }

    public function getEmployee(){
    	  $emp = DB::table('nhan_vien')->get();
    	  return $emp;
    }

    public function getAverageScore(){
        $avgEval = \DB::table('danh_gia')->avg('DiemDG');
        return $avgEval;
    }

    public function getVoteInMonth(){
        $vote = \DB::table('danh_gia')->count();
        return $vote;
    }

    public function getTransToday(){
        $avgEvalToday = \DB::table('giao_dich')->select(DB::raw('*'))
            ->whereRaw('Date(ThoiDiemKTGD) = CURDATE()')->get();
    }

    public function getTimeService(){
        if (\Request::ajax()) {
            $timeService = array();
            $sqlQuery = "SELECT AVG(ThoiGianXLGD) as avg, MONTH(ThoiDiemBDGD) as month FROM `giao_dich` GROUP BY MONTH(ThoiDiemBDGD)";
            $avgTimeService = \DB::select(\DB::raw($sqlQuery));
            for ($i = 0; $i < 12; $i++) {
                array_push($timeService,  0);
                foreach ($avgTimeService as $value) {
                    if (($i+1) == (int)$value->month) {
                        $timeService[$i] = (float)$value->avg;
                    }
                }
            }
        }
        return json_encode($timeService);
    }

    public function getRatioCircle() {
        if (\Request::ajax()) {
            $percentsService = array();
            $sqlQuery1 = "SELECT COUNT(giao_dich.MaDV) AS count, dich_vu.TenDV AS name FROM `dich_vu` INNER JOIN `giao_dich` ON dich_vu.MaDV = giao_dich.MaDV GROUP BY dich_vu.MaDV";
            $countSomeService = \DB::select(\DB::raw($sqlQuery1));

            $sqlQuery2 = "SELECT COUNT(MaDV) as sum FROM `giao_dich`";
            $countAllService = \DB::select(\DB::raw($sqlQuery2));

            foreach ($countSomeService as $value1){
                foreach ($countAllService as $value2){
                    array_push($percentsService, ["name"=>$value1->name, "y"=>($value1->count/$value2->sum)*100]);
                }
            }
        }
        return json_encode($percentsService);
    }

    public function getVote(){
        if (\Request::ajax()) {
            $getVote = array();
            $getAvg = array();
            $sqlQuery1 = "SELECT AVG(DiemDG) as avg, MONTH(ThoiDiemDG) as month FROM `danh_gia` GROUP BY MONTH(ThoiDiemDG)";
            $avg = \DB::select(\DB::raw($sqlQuery1));

            $sqlQuery2 = "SELECT TenDV FROM `dich_vu`";
            $name = \DB::select(\DB::raw($sqlQuery2));

            for ($i = 0; $i < 12; $i++) {
                array_push($getAvg,  0);
                foreach ($avg as $value) {
                    if (($i+1) == (int)$value->month) {
                        $getAvg[$i] = (float)$value->avg;
                    }
                }
            }
        }
        return json_encode($getVote);
    }
}

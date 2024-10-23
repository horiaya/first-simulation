<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\BreakTime;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    //打刻ページ
    public function create(){
        return view('index');
    }

    //日付一覧
    public function index()
    {
        //当日の勤怠を取得
        $today = Carbon::today();
        $items = Attendance::whereDate('created_at', $today)->get();
        $posts= BreakTime::whereDate('created_at', $today)->get();
        return view('attendance',[
            'items'=>$items,
            'posts'=>$posts
        ]);

    }

    //出勤登録
    public function store(Request $request){
        //同じ日に2回出勤が押せない
        $user = Auth::user();
        $oldtimein = Attendance::where('user_id',$user->id)->latest()->first();
        $oldDay = '';
        //退勤前に出勤を2回押せない
        if($oldtimein){
            $oldTimePushIn = new Carbon($oldtimein->startwork);
            $oldDay = $oldTimePushIn->startOfDay();
        }
        $today = Carbon::today();
        if(($oldDay == $today) && (!empty($oldtimein->startwork))) {
            return redirect('/')->with('message','出勤打刻済みです');
        }
        $now = Carbon::now();
        $user_id = Auth::id();
        Attendance::create([
            'user_id' => $user_id,
            'startwork' => $now
        ]);
        return view('/index');
    }

    public function update(Request $request){
        $now = Carbon::today();
        $timeout = Attendance::find($request->id);
        return view('index', ['']);
    }
}

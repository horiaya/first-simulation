<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BreakTime;
use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
//use App\Http\Controllers\Attendance;

class BreakTimeController extends Controller
{
    public function store(Request $request){
        //同じ日に2回出勤が押せない
        //$user = Auth::user();
        //$oldtimein = Attendance::where('user_id',$user->id)->latest()->first();
        //$oldDay = '';


        $now = Carbon::now();
        $attendance_id = Auth::id();
        BreakTime::create([
            'attendance_id' => $attendance_id,
            'startbreak' => $now
        ]);
        return view('/index');
    }
}

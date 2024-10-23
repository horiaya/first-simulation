<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BreakTime extends Model
{
    use HasFactory;

    protected $fillable = ['attendance_id','startbreak', 'endbreak'];

//BreakTimeは一つのAttendanceに属する
    public function attendance(){
        return $this->belongTo(Attendance::class);
    }
}

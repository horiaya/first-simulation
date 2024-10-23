<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','startwork', 'endwork'];
    //protected $guarded = array('id');
    //public static $rules = array(
    //    'user_id' => 'required'
    //);

    //public function User(){
    //    $this->belongsTo('App\Models\User');
    //}
    
// Attendanceは複数のBreakTimeを持つ
    public function breakTimes(){
        return $this->hasMany(BreakTime::class);
    }
}

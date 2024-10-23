<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttendancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'startwork' => '勤務開始',
            'endwork' => '勤務終了'
        ];
        DB::table('attendances')->insert($param);
    }
}

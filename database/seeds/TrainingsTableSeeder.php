<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TrainingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trainings')->insert([
            'detail' => '慣れたらプラス１０kg',
            'user_id' => 1,
            "title"=> "ベンチプレス",
            "point"=> "しっかりと胸を張る",
            "set"=> 3,
            "num"=> 5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}

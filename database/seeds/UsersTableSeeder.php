<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'test',
            'id' => 1,
            'email' => 'test@email.com',
            'password' => bcrypt('test1234'),
            "gym_name" => "ティップネス鶴見店",
            "gym_address" => "神奈川県横浜市鶴見区鶴見中央１丁目３−４",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}

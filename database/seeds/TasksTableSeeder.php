<?php


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;


class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            'title' => 'タスク１',
            'due_date' => '2020-10-10',
            'status' => 1,
            "folder_id" => 1,
        ]);
        DB::table('tasks')->insert([
            'title' => 'タスク２',
            'due_date' => '2020-09-20',
            'status' => 2,
            "folder_id" => 1,
        ]);
        DB::table('tasks')->insert([
            'title' => 'タスク３',
            'due_date' => '2020-10-10',
            'status' => 3,
            "folder_id" => 1,
        ]);
        DB::table('tasks')->insert([
            'title' => 'タスク４',
            'due_date' => '2020-03-10',
            'status' => 1,
            "folder_id" => 2,
        ]);
    }
}

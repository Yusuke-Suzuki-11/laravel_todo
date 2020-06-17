<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Folder;
use App\Task;
use App\User;
use App\Http\Requests\CreateTask;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EditTask;
use Facade\Ignition\Tabs\Tab;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index(int $id)
    {
        // 全てのフォルダをいれる
        $folders = Auth::user()->folders()->get();

        // 選択フォルダ
        $current_folder = Folder::find($id);

        // 選ばれたフォルダに紐づくタスクを取得する
        $tasks = $current_folder->tasks()->get();

        // 現在の日時
        $date = date('Y/m/d');

        // 選択中フォルダの総タスク数
        $all_tasks_num = $current_folder->tasks()->count();
        $all_folders_num = $folders->count();



        return view('tasks/index', [
            'folders' => $folders,
            'current_folder_id' => $current_folder->id,
            'tasks' => $tasks,
            "date" => $date,
            "all_tasks_num" => $all_tasks_num,
            "all_folders_num" => $all_folders_num,
        ]);
    }

    public function showCreateForm(int $id)
    {
        // ビューにフォルダーIDを返す
        return view('tasks/create', ['folder_id' => $id]);
    }

    public function create(int $id, CreateTask $request)
    {
        // フォルダーを取得
        $current_folder = Folder::find($id);

        // タスクを設定
        $task = new Task();
        $task->title = $request->title;
        $task->due_date = $request->due_date;

        // 選択中のフォルダーに結びつけて保存
        $current_folder->tasks()->save($task);

        return redirect()->route('tasks.index', ['id' => $current_folder->id,]);
    }

    public function showEditForm(int $id, int $task_id)
    {
        // タスクIDのタスクを取得
        $task = Task::find($task_id);

        // ビューに返す
        return view('tasks/edit', ['task' => $task,]);
    }

    public function edit(int $id, int $task_id, EditTask $request)
    {
        // タスクIDと一致するタスクを取得
        $task = Task::find($task_id);

        // リクエストから送られてくるカラムを書き込み
        $task->title = $request->title;
        $task->status = $request->status;
        $task->due_date = $request->due_date;
        $task->save();

        //ホームにリダイレクト
        return redirect()->route('tasks.index', ['id' => $task->folder_id,]);
    }




    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        // dd(Auth::user()->taskss()->get()->where("title",'タスク追加'));
        $tasks = Auth::user()->taskss()->get();
        $array = [];
        $folder_name = [];
        $folder_id = [];
        if (!empty($keyword)) {
            foreach($tasks as $task){
                if(preg_match("/$keyword/", $task->title)){
                    array_push($array,$task->title);
                    $foldergroupe = Folder::find($task->folder_id);
                    array_push($folder_name, $foldergroupe->title);
                    array_push($folder_id, $task->folder_id);
                }
            }
        }


        return view('tasks.search', compact('array', 'keyword', 'folder_name', 'folder_id'));
    }


    public function delete(int $id)
    {
        $task = Task::find($id);
        $task->destroy($id);
        return redirect()->route('tasks.index', ['id' => $task->folder_id]);
    }
}

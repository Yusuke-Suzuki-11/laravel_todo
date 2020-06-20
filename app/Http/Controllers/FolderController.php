<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Folder;
use App\Http\Requests\CreateFolder;
use Illuminate\Support\Facades\Auth;


class FolderController extends Controller
{
    //ビュー： フォルダー作成のビューを返す
    public function showCreateForm()
    {
        return view('folders/create');
    }

    public function create(CreateFolder $request){
        // フォルダーを作成
        $folder = new Folder();
        // 送られてきたタイトルを追加
        $folder->title = $request->title;
        // 書き込んだフォルダーを保存
        Auth::user()->folders()->save($folder);
        // ホームにリダイレクト
        return redirect()->route('tasks.index', [
            'id' => $folder->id,
        ]);
    }

    public function destroy(int $id)
    {
        $folder = Folder::find($id);
        $folder->delete();
        return redirect("/");
    }
}

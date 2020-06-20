<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Training;
use Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateTraining;
use Validator;


class TrainingsController extends Controller
{
    public function index(){
        // すべてのフォルダを取得する
        $trainings = Auth::user()->trainings()->get();

        return view('training/index', [
            'trainings' => $trainings,
        ]);
    }

    public function new(){
        return view("training.new");
    }

    public function store(CreateTraining $request){
        $training = new Training();

        $training->user_id = Auth::user()->id;
        $training->title = $request->title;
        $training->detail = $request->detail;
        $training->point = $request->point;
        $training->set = $request->set;
        $training->num = $request->num;
        $training->save();
        $movie = $request->movie;
        $movie->storeAs('public/movies', $training->id . '.mp4');
        return redirect("/training/index");
    }

    public function show(int $id){
        $training = Training::find($id);
        return view("training.show",["training" => $training]);
    }

    public function edit(int $id){
        $training = Training::find($id);
        return view("training.edit",["training"=> $training]);
    }

    public function update(int $id, EditTraining $request){
        $training = Training::find($id);
        $training->title = $request->title;
        $training->detail = $request->detail;
        $training->point = $request->point;
        $training->set = $request->set;
        $training->num = $request->num;
        $training->save();

        if ($request->movie != null) {
            Storage::delete("public/movies/$training->id.mp4");
            $request->movie->storeAs("public/movies", $training->id . '.mp4');
            $request->movie->storeAs('public/movies', $training->id . '.mp4');
        }
        return view("training.show", ["training" => $training]);
    }

    public function delete(int $id){
        $training = Training::find($id);
        Storage::delete("public/movies/$id.mp4");
        $training->destroy($id);
        return redirect("/training/index");
    }

}

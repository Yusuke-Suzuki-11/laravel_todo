@extends('layout')
@section('content')
@inject('Num', 'App\Library\Num')
<div class="container">
    <div class="row">
        @include("share.side")
        <div class="col col-md-9">
            <nav class="panel panel-default">
                <div class="panel-heading" style="background-color: #006888;">
                    <p style="font-weight: bold; text-align: center; font-size: 16px; margin: 0; color: #e9fbfb;">トレーニングメニュー図鑑</p>
                </div>
                <div class="panel-body">
                    <a href="{{ route('training.new') }}" class="btn btn-default btn-block">
                        筋トレメニューを追加する
                    </a>
                </div>
            </nav>
            @foreach ($trainings as $training)
            <nav class="panel panel-default" style="margin: 40px 0; box-shadow: 1px 1px 1px 1px rgba(128, 128, 128, 0.246);">
                <div class="panel-heading" style="background-color: #006888;">
                    <p class="p-h-p" style="font-size: 16px">{{$training->title}}</p>
                </div>
                <div class="panel-body">
                    <div class="card-wrap ">
                        <div class="card text-center">
                            <a href="/training/show/{{$training->id}}" >
                                <video src="/storage/movies/{{ $training->id }}.mp4" width="80%" height="350px" class="card-img-top"></video>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <div class="card-body list-group-item">
                                <p style="font-weight: bold; font-size: 20px;">セット数</p>
                                <span style="font-weight: bold; font-size: 20px"><span class="text-danger" style="font-size: 40px;">{{ $training->set }}</span>セット  <strong style="font-size: 30px">✖︎ </strong> <span class="text-danger" style="font-size: 40px;">{{ $training->num }}</span>回<strong style="font-size: 30px"> ＝ </strong>
                                合計<span class="text-danger" style="font-size: 40px;"> {{$Num->trainingSum($training->set,$training->num) }}</span></span>
                            </div>
                        </div>
                        <a class=" btn btn-danger " style="margin-top: 20px; margin-left: 10px; color: white; float: right; padding: 3px 10px" href="/training/delete/{{$training->id}}">削除</a>
                        <a class=" btn btn-primary" style="margin-top: 20px; color: white; float: right; padding: 3px 10px" href="/training/edit/{{$training->id}}">編集</a>
                    </div>
                </div>
            </nav>
            @endforeach
        </div>
    </div>
</div>
@endsection

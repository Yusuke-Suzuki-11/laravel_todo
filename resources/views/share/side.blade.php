@inject('Num', 'App\Library\Num')
<div class="col col-md-3 position-fixed" >
    <nav class="panel panel-default">
        <div class="panel-body" >
            <a href="/users/{{ Auth::user()->id }}">
            <div class="text-center">
                @if (Auth::user()->profile_photo)
                <p style="margin-top: 10px">
                    <img class="round-img border border-info" src="{{ asset('storage/user_images/' . Auth::user()->profile_photo) }}" style="box-shadow: 0 0 0 5px #006888;"/>
                </p>
                @else
                <img class="round-img border border-info mt-2" src="{{ asset('/images/blank_profile.png') }}" style="box-shadow: 0 0 0 5px #006888;"/>
                @endif
            </div>

        </div>
            <div class="panel-body text-center" style="padding: 0px 0px 15px 0px ;">{{Auth::user()->name}}</div>

        </a>
        <div class="list-group">
            <div class="list-group-item">筋トレ図鑑 : 　<strong style="font-weight: bold">{{Auth::user()->trainings()->count()}} </strong></div>
            <div class="list-group-item">総タスク数 :　 <strong style="font-weight: bold">{{$Num->numCount(Auth::user())}} </strong></div>
            <div class="list-group-item">完了タスク :　<strong style="font-weight: bold"> {{$Num->compNum(Auth::user())}} </strong></div>
            <div class="list-group-item">未完了タスク :　<strong style="font-weight: bold"> {{$Num->noComp(Auth::user())}} </strong></div>

        </div>
    </nav>
</div>

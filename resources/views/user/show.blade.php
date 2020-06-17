@extends('layout')
@section('content')
<div class="container">
    <div class="row center-block">
        <div class="col"  style="margin-bottom: 30px;">
            <nav class="panel panel-default">
                <div class="panel-heading" style="background-color: #006888;">
                    <p class="p-h-p" style="font-size: 18px">ユーザー情報</p>
                </div>
                <div class="panel-body" >
                    <div class="text-center">
                        @if ($user->profile_photo)
                        <p style="margin-top: 10px">
                            <img class="round-img" src="{{ asset('storage/user_images/' . $user->profile_photo) }}" style="box-shadow: 0 0 0 6px #006888;"/>
                        </p>
                        @else
                        <img class="round-img border border-info mt-2" src="{{ asset('/images/blank_profile.png') }}" style="border: 2px solid #4fc1e9;" />
                        @endif
                    </div>

                </div>
                <div class="panel-body text-center" style="padding: 0px 0px 0px 0px ;">{{$user->name}}</div>
                <div class="panel-body text-center" style="padding: 0px 0px 0px 0px ;">
                    {{$user->email}}
                </div>
                <div class="panel-body text-center">
                    <a class="btn btn-sm btn-primary" href="/users/edit">編集する</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                </div>
                <div class="card-body list-group-item text-center" style="width: 65%; margin:0 auto; padding: 30px 0">
                    <p class="tr-cap">お気に入りのジム</p><br>
                    <span style="font-size: 25px; font-weight: bold">{{ $user->gym_name }}</span>
                </div>
                <div class="card-body list-group-item text-center" style="width: 65%; margin:0 auto; padding: 30px 0">
                    <p class="tr-cap" style="margin-bottom: 20px">ジムの住所</p><br>
                    <span style="font-size: 25px; font-weight: bold">{{ $user->gym_address }}</span><br>
                    <div id="map" class="center-block" style="width: 100%; height: 500px; border-radius: 10px; border: 1px solid #e6e9ed; margin-bottom: 50px;" ></div>
                    <div style="margin-bottom: 50px">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <input type="submit" class=" btn btn-danger" style=" color: white; float: right; padding: 3px 10px;" href="{{ route('logout') }}" method="post" value="ログアウト"　 >

                        </form>
                    </div>
                </div>




            </nav>
        </div>
    </div>
</div>





<script>
    function initMap() {

        //表示先の設定
        var target = document.getElementById('map');
        //住所を設定
        var address = "{!! $user->gym_address !!}";
        //座標
        var geocoder = new google.maps.Geocoder();

        geocoder.geocode({ address: address }, function(results, status){
            if (status === 'OK' && results[0]){
                //マップを作成
                var map = new google.maps.Map(target, {
                    center: results[0].geometry.location,
                    zoom: 18
                });

                //住所にマーカーをさす
                var marker = new google.maps.Marker({
                    position: results[0].geometry.location,
                    map: map,
                    animation: google.maps.Animation.DROP
                });

            }else{
                //住所がない時の表示
                alert('お気に入りのジムを設定しよう！');
                target.style.display='none';
            }

        });
    }
</script>
{{--  API連帯  --}}
<script src="//maps.google.com/maps/api/js?key=AIzaSyAeR5-ApY-kmJjmGLB3knEynWhsH_jWTas&callback=initMap"></script>

@endsection


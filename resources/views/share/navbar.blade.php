<nav class="my-navbar">
    <a  href="/" class="logo">Doit!</a>
    <div class="my-navbar-control">
        @if(Auth::check())

        <a href="{{ url('/') }}"  class=" btn-sm btn-danger text-light">Todo</a>
        <p class="nav-li" style="display: inline">｜</p>
        <a href="{{ url('/tasks/search') }}"  class=" btn-sm btn-danger text-light">Todo検索</a>
        <p class="nav-li" style="display: inline">｜</p>
        <a href="{{ route('training.index') }}"  class=" btn-sm btn-danger text-light">筋トレ図鑑</a>
        <p class="nav-li" style="display: inline">｜</p>
        <a href="#" id="logout" class="btn-sm btn-danger text-light">ログアウト</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @else
        <a class="btn-sm btn-danger text-light" href="{{ route('login') }}" class="nav-li">ログイン</a>
        <p class="nav-li" style="display: inline">｜</p>
        <a class="btn-sm btn-danger text-light" href="{{ route('register') }}">会員登録</a>
        @endif
    </div>
</nav>

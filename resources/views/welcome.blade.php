<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" type="text/css">
        <!-- Styles -->
    </head>
    <body>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav">
                    <li role="presentation"><a href="{{route('members.add')}}"> Add Member </a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <ul class="nav navbar-nav navbar-right">
                    </ul>
                @if (Route::has('login'))

                            @auth
                                <li class="active" role="presentation"><a href="{{ url('/home') }}"><i class="glyphicon glyphicon-user"></i> Home<br> <small>{{auth()->user()->name}}</small> </a></li>
                                <li role="presentation"><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Log out</a></li>
                            @else
                                <li role="presentation"><a href="{{ route('login') }}"><i class="glyphicon glyphicon-log-out"></i> Login</a></li>
                                <li role="presentation"><a href="{{ route('register') }}"><i class="glyphicon glyphicon-log-out"></i> Signup</a></li>
                            @endauth

                    @endif
                </ul>
            </div>
        </div>
    </nav>
        <div id="first">
            <div class="container">
                <form  action="{{route('members.details')}}">
                    @csrf
                    <div class="input-group" id="search">
                        <div class="input-group-addon sam"></div>
                        <input name="id" class="form-control sam" type="text" placeholder="Enter ID to search registery">
                        <div class="input-group-btn sam">
                            <button class="btn btn-success" type="submit"><i class="glyphicon glyphicon-search"></i> </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <footer></footer>
        <script src="{{asset('js/app.js')}}"></script>
        <script src="/bootstrap/js/bootstrap.min.js"></script>
        <script id="bs-live-reload" data-sseport="50231" data-lastchange="1517257878577" src="/js/livereload.js"></script>
    </body>
</html>

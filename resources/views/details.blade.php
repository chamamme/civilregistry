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
            <div class="input-group" id="">
                <div class="input-group-addon sam"></div>
                <input name="id" class="form-control sam" type="text" placeholder="Enter Birth ID to search registry">
                <div class="input-group-btn sam">
                    <button class="btn btn-success" type="submit"><i class="glyphicon glyphicon-search"></i> </button>
                </div>
            </div>
        </form>
        @if(($bad))
        <div class="details bg-white " style=" margin-top:10px;  padding:10px 40px;background: #fff;">
            <div class="card" >
                <div class="card-header text-center"> <h4 >Personal Details <button class="btn btn-info pull-right" onclick="window.print();" > <i class="glyphicon glyphicon-print"></i> Print </button> </h4></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <img class="ui medium rounded fluid image" width="100%" src="{{asset($bad->image)}}">
                        </div>
                        <div class="col-md-9">
                            <table class="table table-hover " >
                                <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row"> Name </th>
                                    <td id="_fname">{{$bad->first_name}} {{$bad->first_name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Gender </th>
                                    <td id="_gender">{{$bad->gender}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">D.O.B </th>
                                    <td id="_dob">{{$bad->dob}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Place Of Birth </th>
                                    <td id="_placeofbirth">{{$bad->place_of_birth}}</td>
                                </tr>
                                <tr>
                                    <th scope="row"> Phone </th>
                                    <td id="_phone"> {{$bad->phone}} </td>
                                </tr>

                                <tr>
                                    <th scope="row"> Father </th>
                                    <td id="_fathername">
                                        <i>Name </i>: {{$bad->father_name}}
                                        <br>
                                        <i>Nationality</i>: {{$bad->father_nationality}}
                                        <br>
                                        <i>Occupation</i>: {{$bad->father_occupation}}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"> Mother </th>
                                    <td id="_fathername">
                                        <i>Name </i>: {{$bad->mother_name}}
                                        <br>
                                        <i>Nationality</i>: {{$bad->mother_nationality}}
                                        <br>
                                        <i>Occupation</i>: {{$bad->mother_occupation}}
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="row">
                        @if($pass)
                        <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header text-center"> <h4 >Passport Details </h4></div>
                                    <div class="card-body">
                                        <table class="table table-hover " >
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th scope="row"> No# </th>
                                                <td id="">{{$pass->ref_id}} </td>
                                            </tr>
                                            <tr>
                                                <th scope="row"> Status </th>
                                                <td id="_gender">{{$pass->status ? 'active':'inactive'}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row"> Contact </th>
                                                <td id="_dob">{{$pass->phone}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Place Of Issue </th>
                                                <td id="_placeofbirth">Head Office</td>
                                            </tr>
                                            <tr>
                                                <th scope="row"> Email </th>
                                                <td id="_phone"> {{$pass->email}} </td>
                                            </tr>
                                            <tr>
                                                <th scope="row"> Date Issued </th>
                                                <td id="_gender">{{$pass->created_at}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                        </div>
                        @endif
                        @if($dvla)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header text-center"> <h4 >DVLA Details </h4></div>
                                <div class="card-body">
                                    <table class="table table-hover " >
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row"> No# </th>
                                            <td id="">{{$dvla->ref_id}} </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"> Class </th>
                                            <td id="_gender">{{$dvla->class}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row"> Date Issued </th>
                                            <td id="_gender">{{$dvla->created_at}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if($ec)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header text-center"> <h4 >Electoral Commission Details </h4></div>
                                <div class="card-body">
                                    <table class="table table-hover " >
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row"> No# </th>
                                            <td id="">{{$dvla->ref_id}} </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"> Date Issued </th>
                                            <td id="_gender">{{$dvla->created_at}}</td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if($ec)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header text-center"> <h4 >Electoral Commision Details </h4></div>
                                <div class="card-body">
                                    <table class="table table-hover " >
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row"> No# </th>
                                            <td id="">{{$dvla->ref_id}} </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"> Date Issued </th>
                                            <td id="_gender">{{$dvla->created_at}}</td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </div>
                            @endif
                            @if($hosp)
                            <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header text-center"> <h4 >Hospital Details </h4></div>
                                        <div class="card-body">
                                            <table class="table table-hover " >
                                                <thead>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th scope="row"> No# </th>
                                                    <td id="">{{$hosp->ref_id}} </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"> Weight </th>
                                                    <td id="">{{$hosp->weight}} </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"> Disorder </th>
                                                    <td id="">{{$hosp->disorder}} </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"> Natural Sickness </th>
                                                    <td id="">{{$hosp->natural_sickness}} </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"> Report </th>
                                                    <td id="">{{$hosp->report}} </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"> Date Recorded </th>
                                                    <td id="_gender">{{$hosp->created_at}}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                            </div>
                            @endif
                            @if($ssnit)
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header text-center"> <h4 >SSNIT Details </h4></div>
                                        <div class="card-body">
                                            <table class="table table-hover " >
                                                <thead>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th scope="row"> No# </th>
                                                    <td id="">{{$ssnit->ref_id}} </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"> Profession </th>
                                                    <td id="">{{$ssnit->profession}} </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"> Disorder </th>
                                                    <td id=""> GHC {{$ssnit->salary}} </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"> Date Recorded </th>
                                                    <td id="_gender">{{$ssnit->created_at}}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if($pc)
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header text-center"> <h4 >Police Record </h4></div>
                                        <div class="card-body">
                                            <table class="table table-hover " >
                                                <thead>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th scope="row"> No# </th>
                                                    <td id="">{{$pc->ref_id}} </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"> Case Number </th>
                                                    <td id="">{{$pc->case_number}} </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"> Case Type </th>
                                                    <td id="">{{$pc->case_type}} </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"> Case Report </th>
                                                    <td id="">{{$pc->case_report}} </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"> Officer In Charge </th>
                                                    <td id="">{{$pc->officer_in_charge}} </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"> Date Issued </th>
                                                    <td id="_gender">{{$dvla->created_at}}</td>
                                                </tr>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                                @endif
                    </div>
                </div>
            </div>


        </div>
        @else
            <div class="alert alert-info"> No match found </div>
        @endif
    </div>
</div>
<footer></footer>
<script src="/js/jquery.min.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>
<script id="bs-live-reload" data-sseport="50231" data-lastchange="1517257878577" src="/js/livereload.js"></script>
</body>
</html>

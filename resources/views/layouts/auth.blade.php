<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@php($inst = auth()->user()->institution)
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ghreg') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('semantic/semantic.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                </ul>
            </div>
        </div>
    </nav>
    <main class="py-4">
        @if ( Session::has('flash_message') )

            <div class="alert {{ Session::get('flash_message')['type'] }}">
                <h3>{{ Session::get('flash_message')['message'] }}</h3>
            </div>

        @endif

        <div class="">
            @if ($errors->has('member_id'))
                <div class="row justify-content-center"    >
                    <div class="col-md-6">
                        <div class="ui floating negative  message">
                            <i class="close icon"></i>
                            <div class="header">
                                The user must have a record in Birth and Death's Registry.
                            </div>
                            <p>You can check it by clicking the verify buttom on your right</p>
                        </div>

                    </div>
                </div>
            @endif
            <div class="row">
                <div class="ui fluid container center aligned" style="cursor:pointer">
                    <div class="ui unstackable tiny steps">
                        <div class="step @if(strtolower($inst->name) != 'birth and death') disabled @endif " onclick="booking()">
                            <i class="calendar icon"></i>
                            <div class="content">
                                <div class="title">Birth and Death</div>
                                <div class="description">Ministry of Birth and Death</div>
                            </div>
                        </div>
                        <div class="step  @if(strtolower($inst->name) != 'passport office') disabled @endif " onclick="contact()" id="contactbtn">
                            <i class="travel icon"></i>
                            <div class="content">
                                <div class="title">Passport Office</div>
                                <div class="description">Ghana Immigration</div>
                            </div>
                        </div>
                        <div class=" step @if(strtolower($inst->name) != 'dvlahospital') disabled @endif " id="billingbtn" onclick="billing()">
                            <i class="car icon"></i>
                            <div class="content">
                                <div class="title">DVLA</div>
                                <div class="description">Road safety</div>
                            </div>
                        </div>

                        <div class=" step @if(strtolower($inst->name) != '') disabled @endif " id="healthbtn" onclick="hospital()">
                            <i class="heartbeat icon"></i>
                            <div class="content">
                                <div class="title">Hospital</div>
                                <div class="description">Ministry Of Health</div>
                            </div>
                        </div>

                        <div class=" step @if(strtolower($inst->name) != 'ec') disabled @endif " id="ecbtn" onclick="ec()">
                            <i class="inbox icon"></i>
                            <div class="content">
                                <div class="title">EC</div>
                                <div class="description">Electoral Commission</div>
                            </div>
                        </div>
                        <div class=" step @if(strtolower($inst->name) != 'ssnit') disabled @endif " onclick="ssnit()" id="ssnitbtn">
                            <i class="database icon"></i>
                            <div class="content">
                                <div class="title">SSNIT</div>
                                <div class="description">Social Security</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                {{--<div class="col-md-4">--}}
                    {{--<div class="list-group">--}}
                        {{--<a href="{{route('members.add')}}" class="list-group-item active"> Add Member </a>--}}
                        {{--<a href="" class="list-group-item">LookUp</a>--}}
                        {{--<a href="#" class="list-group-item">Morbi leo risus</a>--}}
                        {{--<a href="#" class="list-group-item">Porta ac consectetur ac</a>--}}
                        {{--<a href="#" class="list-group-item">Vestibulum at eros</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="col-md-8">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
</div>
</body>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content text-left">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Birthcert Verification</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="input-group">
                        <input class="form-control" id="bad_id" type="text" value="" name="bad_id" placeholder="Enter Birth Certificate Id">
                        <span class="input-group-btn">
                            <button class="btn btn-default" onclick="lookup()" type="button">Go!</button>
                          </span>
                    </div>
                </div>

                <div id="bad_detail" class="" style="display: none">
                    <div id="bad_message"></div>
                    <table class="table table-hover " >
                    <thead>
                    <tr>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                        <tbody>
                            <tr>
                                <th scope="row">First Name </th>
                                <td id="_fname"></td>
                            </tr>
                            <tr>
                                <th scope="row">Last Name </th>
                                <td id="_lname"></td>
                            </tr>
                            <tr>
                                <th scope="row">Gender </th>
                                <td id="_gender"></td>
                            </tr>
                            <tr>
                                <th scope="row">Place Of Birth </th>
                                <td id="_placeofbirth"></td>
                            </tr>
                            <tr>
                                <th scope="row">Phone </th>
                                <td id="_phone"></td>
                            </tr>
                            <tr>
                                <th scope="row">D.O.B </th>
                                <td id="_dob"></td>
                            </tr>
                            <tr>
                                <th scope="row">Father Name </th>
                                <td id="_fathername"></td>
                            </tr>
                            <tr>
                                <th scope="row">Father Nationality </th>
                                <td id="_fathernation"></td>
                            </tr>

                            <tr>
                                <th scope="row">Father Occupation </th>
                                <td id="_fatheroccup"></td>
                            </tr>
                            <tr>
                                <th scope="row">Mother Name </th>
                                <td id="_mothername"></td>
                            </tr>
                            <tr>
                                <th scope="row">Mother Nationality </th>
                                <td id="_mothernation"></td>
                            </tr>
                            <tr>
                                <th scope="row">Mother Occupation </th>
                                <td id="_motheroccup"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</html>
<script>
    function lookup() {
        $('#bad_detail').fadeIn();
        bad_id = $('#bad_id').val();
        endpoint = "/members/verify?bad_id="+bad_id
        fetch(endpoint)
                .then(resp => resp.json())
                .then(data =>{
                    len = Object.keys(data).length;
                    if(len < 1 ){
                        $('#bad_message').html("<div class='alert alert-info' >No match found !</div>")
                        $('#bad_detail > table').hide();
                        $("#bad_message").show();
                        $('#member_id').val('');
                    }else{
                        $("#bad_message").hide();
                        $('#member_id').val(data.ref_id);
                        $('#_fname').html(data.first_name);
                        $('#_lname').html(data.last_name);
                        $('#_gender').html(data.gender);
                        $('#_placeofbirth').html(data.place_of_birth);
                        $('#_dob').html(data.dob);
                        $('#_phone').html(data.phone);
                        $('#_email').html(data.email);
                        $('#_fathername').html(data.father_name);
                        $('#_fatheroccup').html(data.father_occupation);
                        $('#_fathernation').html(data.father_nationality);

                        $('#_mothername').html(data.mother_name);
                        $('#_motheroccup').html(data.mother_occupation);
                        $('#_mothernation').html(data.mother_nationality);
                        $('#bad_detail > table').show();
                        $('#bad_detail').fadeIn();
                    }
        console.log(data.length);
                });
    }
</script>
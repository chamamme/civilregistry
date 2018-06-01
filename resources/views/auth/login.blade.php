@extends('layouts.app')

@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-t-50 p-b-90">
            <a class="" href="{{ url('/') }}">
                    <img class="ui tiny centered image"  src="{{asset('img/logo.jpg')}}">
                </a>
                <form class="login100-form validate-form flex-sb flex-w" method="post" action="{{ route('login') }}">
                    @csrf
					<span class="login100-form-title p-b-51">
						Login
					</span>
                    <div style="color: red; text-align: center"> </div>

                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Staff Id is required">
                        <input class="input100 form-control{{ $errors->has('staff_id') ? ' is-invalid' : '' }}" type="text" name="staff_id" placeholder="Staff ID" value="{{old('staff_id')}}">
                        <span class="focus-input100"></span>
                        @if ($errors->has('staff_id'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('staff_id') }}</strong>
                                    </span>
                        @endif
                    </div>


                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
                        <input class="input100 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="flex-sb-m w-full p-t-3 p-b-24">
                        <div class="contact100-form-checkbox">
                            <input id="ckb1" class="input-checkbox100" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>
                        <br>
                        <div>
                            <a href="{{ route('password.request') }}" class="txt1">
                                Forgot Password?
                            </a>
                        </div>
                        <br>
                        <div>
                            <a href="{{route('register')}}" class="txt1">
                                Sign up?
                            </a>
                        </div>
                    </div>

                    <div class="container-login100-form-btn m-t-17">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

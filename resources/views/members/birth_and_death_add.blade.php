@extends('layouts.auth')

@section('content')

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('members.add') }}">
                    <input id="member_id" type="hidden" name="member_id" value="" required>
                    <div class="card">
                        <div class="card-header text-center">{{ __("Add Member to {$inst->name}") }}

                        <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#myModal">
                                Verify
                            </button>
                        </div>

                        <div class="card-body">
                                @csrf
                                <div class="row">
                                    <div class="col col-md-6">
                                        <div class="form-group">
                                            <label for="first_name" class="-form-label text-md-right">{{ __('First Name') }}</label>

                                                <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required >
                                                @if ($errors->has('first_name'))
                                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="col col-md-6">
                                        <div class="form-group">
                                            <label for="last_name" class=" text-md-right">{{ __('Last Name') }}</label>

                                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required >
                                                @if ($errors->has('last_name'))
                                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                                @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col col-md-6">
                                        <div class="form-group">
                                            <label for="phone" class=" text-md-right">{{ __('Phone') }}</label>
                                            <div class="">
                                                <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required >
                                                @if ($errors->has('phone'))
                                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col col-md-6">
                                        <div class="form-group">
                                            <label for="email" class=" text-md-right">{{ __('E-Mail') }}</label>
                                            <div class="">
                                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-md-6">
                                        <div class="form-group">
                                            <label for="dob" class=" text-md-right">{{ __(' Date Of Birth') }}</label>
                                            <div class="">
                                                <input id="dob" type="date" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" name="dob" value="{{ old('dob') }}" required>
                                                @if ($errors->has('dob'))
                                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-md-6">
                                        <div class="form-group">
                                            <label for="place_of_birth" class=" text-md-right">{{ __(' Place Of Birth') }}</label>
                                            <div class="">
                                                <input id="place_of_birth" type="text" class="form-control{{ $errors->has('place_of_birth') ? ' is-invalid' : '' }}" name="place_of_birth" value="{{ old('place_of_birth') }}" required>
                                                @if ($errors->has('place_of_birth'))
                                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('place_of_birth') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>

                    <!----Parent Details --->
                    <div class="card">
                        <div class="card-header">Parent Details</div>
                        <div class="card-body">
                            <div class="row">
                                <div class=" col-md-12">
                                    <div class="form-group">
                                        <label for="father_name" class=" text-md-right">{{ __(' Father Name') }}</label>
                                        <div class="">
                                            <input id="father_name" type="text" class="form-control{{ $errors->has('father_name') ? ' is-invalid' : '' }}" name="father_name" value="{{ old('father_name') }}" required>
                                            @if ($errors->has('father_name'))
                                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('father_name') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col-md-6">
                                    <div class="form-group">
                                        <label for="father_nationality" class=" text-md-right">{{ __(' Father Nationality') }}</label>

                                            <input id="father_nationality" type="text" class="form-control{{ $errors->has('father_nationality') ? ' is-invalid' : '' }}" name="father_nationality" value="{{ old('father_nationality') }}" required>
                                            @if ($errors->has('father_nationality'))
                                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('father_nationality') }}</strong>
                                    </span>
                                            @endif
                                    </div>
                                </div>
                                <div class=" col-md-6">
                                    <div class="form-group">
                                        <label for="father_occupation" class=" text-md-right">{{ __(' Father Occupation') }}</label>
                                        <div class="">
                                            <input id="father_occupation" type="text" class="form-control{{ $errors->has('father_occupation') ? ' is-invalid' : '' }}" name="father_occupation" value="{{ old('father_occupation') }}" required>
                                            @if ($errors->has('father_occupation'))
                                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('father_occupation') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col-md-12">
                                    <div class="form-group">
                                        <label for="mother_name" class=" text-md-right">{{ __(' Mother Name') }}</label>
                                        <div class="">
                                            <input id="mother_name" type="text" class="form-control{{ $errors->has('mother_name') ? ' is-invalid' : '' }}" name="mother_name" value="{{ old('mother_name') }}" required>
                                            @if ($errors->has('mother_name'))
                                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('mother_name') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col-md-6">
                                    <div class="form-group">
                                        <label for="mother_nationality" class=" text-md-right">{{ __(' Mother Nationality') }}</label>
                                        <div class="">
                                            <input id="mother_nationality" type="text" class="form-control{{ $errors->has('mother_nationality') ? ' is-invalid' : '' }}" name="mother_nationality" value="{{ old('mother_nationality') }}" required>
                                            @if ($errors->has('mother_nationality'))
                                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('mother_nationality') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class=" col-md-6">
                                    <div class="form-group">
                                        <label for="mother_occupation" class=" text-md-right">{{ __(' Mother Occupation') }}</label>
                                        <div class="">
                                            <input id="mother_occupation" type="text" class="form-control{{ $errors->has('mother_occupation') ? ' is-invalid' : '' }}" name="mother_occupation" value="{{ old('mother_occupation') }}" required>
                                            @if ($errors->has('mother_occupation'))
                                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('mother_occupation') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="row">
                                    {{--<div class="col-md-6">--}}
                                        {{--<div class="form-group">--}}
                                            {{--<label for="biodata" class=" text-md-right">{{ __(' BioData') }}</label>--}}
                                            {{--<div class="col-md-6">--}}
                                                {{--<button id="biodata" type="button" onclick="" class="form-control{{ $errors->has('biodata') ? ' is-invalid' : '' }}" name="biodata" value="{{ old('biodata') }}" required>--}}
                                                    {{--Add Fingerprint Data--}}
                                                {{--</button>--}}
                                                {{--@if ($errors->has('biodata'))--}}
                                                    {{--<span class="invalid-feedback">--}}
                                        {{--<strong>{{ $errors->first('biodata') }}</strong>--}}
                                    {{--</span>--}}
                                                {{--@endif--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gender" class=" text-md-right">{{ __('Gender') }}</label>
                                            <div class="col-md-6">
                                                <div class=" row">
                                                    <div class="col- col-md-6">
                                                        <input id="male" type="radio" name="gender" value="male" required @if(old('gender') == 'male') checked @endif> <label for="male">Male</label>
                                                    </div>
                                                </div>
                                                <div class=" row">
                                                    <div class="col- col-md-6">
                                                        <input id="female" type="radio" class="" name="gender" value="female" required  @if(old('gender') == 'female') checked @endif><label for="female">Female</label>
                                                    </div>
                                                </div>
                                                @if ($errors->has('gender'))
                                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Save') }}
                                        </button>
                                    </div>
                                </div>

                        </div>
                    </div>
                </form>
                <!-- Modal -->

@endsection



@extends('layouts.auth')

@section('content')
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('members.add') }}">
                    <input id="member_id" type="hidden" name="member_id" value="{{old('member_id')}}" required>
                    <div class="card">
                        <div class="card-header text-center">
                            <h3>{{ __($inst->name) }}
                        <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#myModal">
                                Check Birth Registry
                            </button>
                            </h3>
                        </div>

                        <div class="card-body">
                                @csrf
                                <div class="row">
                                    <div class="col col-md-6">
                                        <div class="form-group">
                                            <label for="first_name" class="-form-label text-md-right">{{ __('First Name') }}</label>

                                                <input readonly id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required >
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

                                                <input readonly id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required >
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
                                                <input readonly id="dob" type="date" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" name="dob" value="{{ old('dob') }}" required>
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
                                            <label for="salary" class=" text-md-right">{{ __('Salary') }}</label>
                                            <div class="input-group-addon">
                                                <input id="salary" type="number" class="form-control{{ $errors->has('salary') ? ' is-invalid' : '' }}" name="salary" value="{{ old('salary') }}" required>
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default" type="button">FT</button>
                                                  </span>
                                            </div>
                                            @if ($errors->has('salary'))
                                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('salary') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="gender" class=" text-md-right">{{ __('Gender') }}</label>
                                            <div class="col-md-12">
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
                                    <div class=" col-md-3">
                                        <div class="form-group">
                                            <label for="marital_status" class=" text-md-right">{{ __('Marital Status') }}</label>
                                            <div class="">
                                                <select id="marital_status"class="form-control{{ $errors->has('marital_status') ? ' is-invalid' : '' }}" name="marital_status" value="{{ old('marital_status') }}" required>
                                                    <option value="">--- Select Marital Status ---</option>
                                                    <option value="single" @if(old('marital_status') == 'single') selected @endif> Single </option>
                                                    <option value="married" @if(old('marital_status') == 'married') selected @endif> Married  </option>
                                                    <option value="divorced" @if(old('marital_status') == 'divorced') selected @endif> Divorced  </option>
                                                </select>
                                                @if ($errors->has('marital_status'))
                                                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('marital_status') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-md-3">
                                        <div class="form-group">
                                            <label for="profession" class=" text-md-right">{{ __(' Profession') }}</label>
                                            <div class="">
                                                <input id="profession" type="text" class="form-control{{ $errors->has('profession') ? ' is-invalid' : '' }}" name="profession" value="{{ old('profession') }}" required>
                                                @if ($errors->has('profession'))
                                                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('profession') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class=" col-md-3">
                                        <div class="form-group">
                                            <label for="nationality" class=" text-md-right">{{ __('Nationality') }}</label>
                                            <div class="">
                                                <select id="nationality" type="text" class="form-control{{ $errors->has('nationality') ? ' is-invalid' : '' }}" name="nationality" value="{{ old('nationality') }}" required>
                                                    <option value=""> --Select Nationality-- </option>
                                                    @foreach($countries as $ct)
                                                        <option value="{{$ct->demonym}}" @if(old('nationality')== $ct->demonym) selected @endif>{{$ct->demonym}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('nationality'))
                                                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('nationality') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-md-5">
                                        <div class="form-group">
                                            <label for="residential_address" class=" text-md-right">{{ __(' Residential Address') }}</label>
                                            <div class="">
                                                <input id="residential_address" type="text" class="form-control{{ $errors->has('residential_address') ? ' is-invalid' : '' }}" name="residential_address" value="{{ old('residential_address') }}" required>
                                                @if ($errors->has('residential_address'))
                                                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('residential_address') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-md-4">
                                        <div class="form-group">
                                            <label for="postal_address" class=" text-md-right">{{ __(' Postal Address') }}</label>
                                            <div class="">
                                                <input id="postal_address" type="text" class="form-control{{ $errors->has('postal_address') ? ' is-invalid' : '' }}" name="postal_address" value="{{ old('postal_address') }}" required>
                                                @if ($errors->has('postal_address'))
                                                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('postal_address') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-md-3">
                                        <div class="form-group">
                                            <label for="image" class=" text-md-right">{{ __(' Photo ') }}</label>
                                            <div class="">
                                                <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}" required>
                                                @if ($errors->has('image'))
                                                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                            <div class=" col-md-6">
                                <div class="form-group">
                                    <label for="id_type" class=" text-md-right">{{ __('ID Type') }}</label>
                                    <div class="">
                                        <select id="id_type" type="text" class="form-control{{ $errors->has('id_type') ? ' is-invalid' : '' }}" name="id_type" value="{{ old('id_type') }}" required>
                                            <option value="">--- Select ID Type ---</option>
                                            <option value="national_id">National ID </option>
                                            <option value="dvla">Drivers Licence  </option>
                                            <option value="voters"> Voters  </option>
                                        </select>
                                        @if ($errors->has('id_type'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('id_type') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class=" col-md-6">
                                <div class="form-group">
                                    <label for="id_number" class=" text-md-right">{{ __(' ID Number ') }}</label>
                                    <div class="">
                                        <input id="id_number" type="text" class="form-control{{ $errors->has('id_number') ? ' is-invalid' : '' }}" name="id_number" value="{{ old('id_number') }}" required>
                                        @if ($errors->has('id_number'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('id_number') }}</strong>
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



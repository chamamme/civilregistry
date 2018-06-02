@extends('layouts.auth')

@section('content')

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('members.add') }}">
                    <input id="member_id" type="hidden" name="member_id" value="" required>
                    <input id="status" type="hidden" name="status" value="deceased" required>
                    <div class="card">
                        <div class="card-header text-center">
                        <h3>Death</h3>

                        <!-- Button trigger modal -->

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

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gender" class=" text-md-right">{{ __('Gender') }}</label>
                                            <div class="col-md-6">
                                                <select class="form-control" type="radio" name="gender" value="male" required>
                                                    <option value="">--Select Gender--</option>
                                                    <option value="male"  @if(old('gender') == 'male') selected @endif>Male</option>
                                                    <option value="female"  @if(old('gender') == 'female') selected @endif>Female</option>
                                                </select>

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
                                            <label for="date_of_death" class=" text-md-right">{{ __(' Date of Death') }}</label>
                                            <div class="">
                                                <input id="date_of_death" type="date" class="form-control{{ $errors->has('date_of_death') ? ' is-invalid' : '' }}" name="date_of_death" value="{{ old('date_of_death') }}" required>
                                                @if ($errors->has('date_of_death'))
                                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('date_of_death') }}</strong>
                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-md-3">
                                        <div class="form-group">
                                            <label for="time_of_death" class=" text-md-right">{{ __(' Time of Death') }}</label>
                                            <div class="">
                                                <input id="time_of_death" type="time" class="form-control{{ $errors->has('time_of_death') ? ' is-invalid' : '' }}" name="time_of_death" value="{{ old('time_of_death') }}" required>
                                                @if ($errors->has('time_of_death'))
                                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('time_of_death') }}</strong>
                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-md-6">
                                        <div class="form-group">
                                            <label for="cause_of_death" class=" text-md-right">{{ __(' Cause Of Death') }}</label>
                                            <div class="">
                                                <input id="cause_of_death" type="text" class="form-control{{ $errors->has('cause_of_death') ? ' is-invalid' : '' }}" name="cause_of_death" value="{{ old('cause_of_death') }}" required>
                                                @if ($errors->has('cause_of_death'))
                                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('cause_of_death') }}</strong>
                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="death_location" class=" text-md-right">{{ __('Death Location') }}</label>
                                            <div class="">
                                                <input id="death_location" type="text" class="form-control{{ $errors->has('death_location') ? ' is-invalid' : '' }}" name="death_location" value="{{ old('death_location') }}" required>
                                                @if ($errors->has('death_location'))
                                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('death_location') }}</strong>
                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="death_evidence" class=" text-md-right">{{ __('Evidence') }}</label>
                                            <div class="">
                                                <input id="death_evidence" type="file" class="form-control{{ $errors->has('death_evidence') ? ' is-invalid' : '' }}" name="death_evidence" value="{{ old('death_evidence') }}" required>
                                                @if ($errors->has('death_evidence'))
                                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('death_evidence') }}</strong>
                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="image" class=" text-md-right">{{ __('Image of Deceased') }}</label>
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name_of_registerer" class=" text-md-right">{{ __('Name Of Registerer') }}</label>
                                            <div class="">
                                                <input id="name_of_registerer" type="text" class="form-control{{ $errors->has('name_of_registerer') ? ' is-invalid' : '' }}" name="name_of_registerer" value="{{ old('name_of_registerer') }}" required>
                                                @if ($errors->has('name_of_registerer'))
                                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name_of_registerer') }}</strong>
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



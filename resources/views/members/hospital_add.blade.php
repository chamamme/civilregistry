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
                        <div class="card-header text-center">
                            <h3>{{ __($inst->name) }}
                        <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#myModal">
                                Verify
                            </button>
                            </h3>
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
                                <div class=" col-md-3">
                                    <div class="form-group">
                                        <label for="nationality" class=" text-md-right">{{ __('Nationality') }}</label>
                                        <div class="">
                                            <input id="nationality" type="text" class="form-control{{ $errors->has('nationality') ? ' is-invalid' : '' }}" name="nationality" value="{{ old('nationality') }}" required>
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
                                    <div class="col col-md-6">
                                        <div class="form-group">
                                            <label for="weight" class=" text-md-right">{{ __('Weight') }}</label>
                                            <div class="">
                                                <input id="weight" type="number" class="form-control{{ $errors->has('weight') ? ' is-invalid' : '' }}" name="weight" value="{{ old('weight') }}" required>

                                                @if ($errors->has('weight'))
                                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('weight') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            <div class="row">
                                <div class=" col-md-6">
                                    <div class="form-group">
                                        <label for="disorders" class=" text-md-right">{{ __('disorders') }}</label>
                                        <div class="">
                                            <textarea id="disorders" class="form-control{{ $errors->has('disorders') ? ' is-invalid' : '' }}" name="disorders"  >{{ old('disorders') }}</textarea>
                                            @if ($errors->has('disorders'))
                                                <span class="invalid-feedback">
                                                <strong>{{ $errors->first('disorders') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class=" col-md-6">
                                    <div class="form-group">
                                        <label for="natural_sickness" class=" text-md-right">{{ __('Natural Sickness') }}</label>
                                        <div class="">
                                            <textarea id="natural_sickness" class="form-control{{ $errors->has('natural_sickness') ? ' is-invalid' : '' }}" name="natural_sickness"  >{{ old('natural_sickness') }}</textarea>
                                            @if ($errors->has('natural_sickness'))
                                                <span class="invalid-feedback">
                                                <strong>{{ $errors->first('natural_sickness') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class=" col-md-12">
                                    <div class="form-group">
                                        <label for="report" class=" text-md-right">{{ __('Report') }}</label>
                                        <div class="">
                                            <textarea id="report" class="form-control{{ $errors->has('report') ? ' is-invalid' : '' }}" name="report" required>{{ old('report') }}</textarea>
                                            @if ($errors->has('report'))
                                                <span class="invalid-feedback">
                                                <strong>{{ $errors->first('report') }}</strong>
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



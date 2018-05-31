@extends('layouts.auth')

@section('content')
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('members.add') }}" enctype="multipart/form-data">
                    <input id="member_id" type="hidden" name="member_id"value="{{old('member_id')}}" required>

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
                                <div class="col col-md-3">
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
                                        <label for="case_type" class=" text-md-right">{{ __('Case Type') }}</label>
                                        <div class="">
                                            <select id="case_type" class="form-control{{ $errors->has('case_type') ? ' is-invalid' : '' }}" name="case_type"  >
                                                <option value="">--Select Case Type -- </option>
                                                <option value="accident" @if(old('case_type')== 'accident') selected @endif>Accident</option>
                                                <option value="criminal" @if(old('case_type')== 'criminal') selected @endif>Criminal</option>
                                                <option value="death" @if(old('case_type')== 'death') selected @endif>Death</option>
                                                {{ old('case_type') }}</select>
                                            @if ($errors->has('case_type'))
                                                <span class="invalid-feedback">
                                                <strong>{{ $errors->first('case_type') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class=" col-md-6">
                                    <div class="form-group">
                                        <label for="case_number" class=" text-md-right">{{ __('Case Number') }}</label>
                                        <div class="">
                                            <input id="case_number" class="form-control{{ $errors->has('case_number') ? ' is-invalid' : '' }}" name="case_number"  value="{{old('case_number')}}" >
                                            @if ($errors->has('case_number'))
                                                <span class="invalid-feedback">
                                                <strong>{{ $errors->first('case_number') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class=" col-md-12">
                                    <div class="form-group">
                                        <label for="case_report" class=" text-md-right">{{ __('Case Report') }}</label>
                                        <div class="">
                                            <textarea id="case_report" class="form-control{{ $errors->has('case_report') ? ' is-invalid' : '' }}" name="case_report" required>{{ old('case_report') }}</textarea>
                                            @if ($errors->has('case_report'))
                                                <span class="invalid-feedback">
                                                <strong>{{ $errors->first('case_report') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <div class="form-group">
                                        <label for="officer_in_charge" class=" text-md-right">{{ __('Officer In Charge') }}</label>
                                        <div class="">
                                            <input id="officer_in_charge" type="text" class="form-control{{ $errors->has('officer_in_charge') ? ' is-invalid' : '' }}" name="officer_in_charge" value="{{ old('officer_in_charge') }}" required >
                                            @if ($errors->has('officer_in_charge'))
                                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('officer_in_charge') }}</strong>
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



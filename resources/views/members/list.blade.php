@extends('layouts.auth')

@section('content')
@php($inst = auth()->user()->institution)
@php($slug = strtolower(snake_case($inst->name,'_')))
    <div class="card">
        <div class="card-header">

            <h3>{{ $inst->name  }} Entries
                @if($slug == 'birth_and_death')
                    <a  href="{{route('members.add',['type'=>'death'])}}" class="btn btn-danger pull-right ">
                        <i class=" icon "> </i> Record Death
                    </a>

                @endif

            <a  href="{{route('members.add')}}" class="btn btn-success pull-right ">
                <i class=" icon add "></i> Add New
            </a>

            </h3>
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
                @if($slug == 'birth_and_death')
                    <div class="">
                            <button class="ui  button pull-right" tabindex="0" data-toggle="modal" data-target="#reportModal">
                               <i class="file icon "></i> Generate Report
                            </button>

                    </div>
                @endif
            <table class="table table-striped">
                <caption>Members of {{ auth()->user()->institution->name}}</caption>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Date Of birth</th>
                        <th>Member Since</th>
                        @if($slug == "birth_and_death")
                        <th>Action</th>
                        @endif

                    </tr>
                </thead>
                <tbody>
                @php($count = 1)
                @foreach($members as $member)
                    <tr  class=" @if($member->status =='deceased') bg-warning @endif" >
                        <th scope="row">{{$count}}</th>
                        <td>{{$member->ref_id}}</td>
                        <td>{{$member->last_name}} {{$member->first_name}}</td>
                        <td>{{$member->gender}}</td>
                        <td>{{$member->email}}</td>
                        <td>{{$member->dob}}</td>
                        <td>{{$member->created_at}}</td>
                        @if($slug == "birth_and_death")
                        <td>
                            @if($member->status =='alive')
                            <a href="#" class="btn btn-default" data-toggle="modal" onclick="document.getElementById('ref_id').value='{{$member->ref_id}}'" data-target="#deceasedModal"><i class="glyphicon glyphicon-eye-open"></i> Mark Deceased </a></td>
                            @else
                            <button onclick="" class="btn btn-default" disabled><i class="glyphicon glyphicon-eye-open"></i> Deceased </button></td>

                        @endif
                        @endif
                    </tr>
                    @php($count++)
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="deceasedModal" tabindex="-1" role="dialog" aria-labelledby="MarkDeceased">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Mark as Deceased</h4>
            </div>
            <form id="deceased-form" action="{{route("members.markDeceased")}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="ref_id" name="ref_id">
                <div class="modal-body">
                <div class="row">
                    <div class=" col-md-4">
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
                    <div class=" col-md-5">
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Proceed</button>
            </div>
            </form>
        </div>

    </div>
</div>
<div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="reportModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Generate Report</h4>
            </div>
            <form id="report-form" action="{{route("members.report")}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class=" col-md-6">
                            <div class="form-group">
                                <label for="from" class=" text-md-right">{{ __(' From ') }}</label>
                                <div class="">
                                    <input id="from" type="date" class="form-control{{ $errors->has('from') ? ' is-invalid' : '' }}" name="from" value="{{ old('from') }}" required>
                                    @if ($errors->has('from'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('from') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class=" col-md-6">
                            <div class="form-group">
                                <label for="to" class=" text-md-right">{{ __(' To') }}</label>
                                <div class="">
                                    <input id="to" type="date" class="form-control{{ $errors->has('to') ? ' is-invalid' : '' }}" name="to" value="{{ old('to') }}" required>
                                    @if ($errors->has('to'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('to') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class=" col-md-6">
                            <div class="form-group">
                                <label for="type" class=" text-md-right">{{ __(' Report Type ') }}</label>
                                <div class="">
                                    <select id="type" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" value="{{ old('type') }}" required>
                                        <option value="">-- Select Type --</option>
                                        <option value="birth">Birth</option>
                                        <option value="death"> Death</option>
                                    </select>
                                    @if ($errors->has('type'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class=" col-md-6">
                            <div class="form-group">
                                <label for="location" class=" text-md-right">{{ __('Location') }}</label>
                                <div class="">
                                    <input id="location" type="text" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" name="location" value="{{ old('location') }}" >
                                    @if ($errors->has('location'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Generate</button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection

@section('script')


@extends('layouts.auth')

@section('content')
@php($inst = auth()->user()->institution)
@php($slug = strtolower(snake_case($inst->name,'_')))
    <div class="card">
        <div class="card-header">
            <h3>{{ $inst->name  }} Entries
            <a  href="{{route('members.add')}}" class="btn btn-primary pull-right ">
                <i class=" fa fa-plus"></i>Add New
            </a>
            </h3>
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
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
                    <tr>
                        <th scope="row">{{$count}}</th>
                        <td>{{$member->ref_id}}</td>
                        <td>{{$member->last_name}} {{$member->first_name}}</td>
                        <td>{{$member->gender}}</td>
                        <td>{{$member->email}}</td>
                        <td>{{$member->dob}}</td>
                        <td>{{$member->created_at}}</td>
                        @if($slug == "birth_and_death")
                        <td>
                            <a href="#" onclick="if(confirm('Are you sure you want to mark this person as deceased? Action cannot be reverted')){$('#deceased-form').submit()}" class="btn btn-default"><i class="glyphicon glyphicon-eye-open"></i> Mark Deceased </a></td>
                            <form id="deceased-form" action="{{route("members.markDeceased",$member->ref_id)}}" method="get" style="display: none;">
                                @csrf
                            </form>
                        @endif
                    </tr>
                    @php($count++)
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

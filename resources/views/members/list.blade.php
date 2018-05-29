@extends('layouts.auth')

@section('content')

    <div class="card">
        <div class="card-header">
            <h3>{{ auth()->user()->institution->name}} Entries
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
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Date Of birth</th>
                        <th>Member Since</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                @php($count = 1)
                @foreach($members as $member)
                    <tr>
                        <th scope="row">{{$count}}</th>
                        <td>{{$member->last_name}} {{$member->first_name}}</td>
                        <td>{{$member->gender}}</td>
                        <td>{{$member->email}}</td>
                        <td>{{$member->dob}}</td>
                        <td>{{$member->created_at}}</td>
                        <td><a href="#" class="btn btn-default"><i class="glyphicon glyphicon-eye-open"></i>  View</a></td>
                    </tr>
                    @php($count++)
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

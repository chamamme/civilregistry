@extends('layouts.auth')

@section('content')

            <div class="card">
                <div class="card-header">
                    Dashboard
                    <a  href="{{route('members.add')}}" class=" btn btn-default pull-right ">
                        <i class=" fa fa-plus"></i>Add member
                    </a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>

@endsection

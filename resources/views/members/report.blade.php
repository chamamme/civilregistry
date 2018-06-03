

@extends('layouts.auth')

@section('content')
    @php($inst = auth()->user()->institution)
    @php($slug = strtolower(snake_case($inst->name,'_')))
    <div class="card">
        <div class="card-header">
            <a  href="{{route('members.list')}}" class="btn btn-success pull-right ">
                <i class="icon home "></i> Home
            </a>
            <h3> {{strtoupper($status)}} Report

            </h3>
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class=" text-center">
                <div class="ui  statistic">
                    <div class="value">
                        {{$result->count()}}
                    </div>
                    <div class="label">
                        Total
                    </div>
                </div>
            </div>
            @include("members/__{$status}")
        </div>
    </div>

@endsection

@section('script')


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Helpdesk Dashboard</div>

                <div class="panel-body">
                    You are logged in as Helpdesk!
                    <hr>
                    <a href="{{ url('/help/register') }}">Register a Doctor</a>
                    <hr>
                    <a href="{{ url('/help/manage') }}">Manage Proficiency</a>
                    <hr>
                    <a href="{{ url('/help/appointment/register') }}">Set an apointment</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
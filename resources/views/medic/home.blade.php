@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Doctor Dashboard</div>

                <div class="panel-body">
                      <a href="{{ url('/medic/appointment/home') }}" button type="button" class="btn btn-primary">
                    <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                    Manage Appointments
                    </button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Helpdesk Dashboard 
                
                </div>
                <div class="panel-body">
                    <a href="{{ url('/help/register') }}" button type="button" class="btn btn-primary " >
                    <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span>
                    Register a Doctor 
                    </button></a>
                        <hr>
                    <a href="{{ url('/help/proficiency/home') }}" button type="button" class="btn btn-primary " >
                    <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                    Manage Proficiency
                   </button></a>
                        <hr>
                    <a href="{{ url('/help/appointment/home') }}" button type="button" class="btn btn-primary">
                    <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                    Manage Appointments
                    </button></a>
{{--                         <hr>        
                    <a href="{{ url('/help/appointment/register') }}" button type="button" class="btn btn-primary">
                    <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span>
                    Set an apointment
                    </button></a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
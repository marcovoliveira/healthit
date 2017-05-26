@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Attach a Proficiency</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/help/home/proficiencyattach">
                        {{ csrf_field() }}                    
                        <!-- prof_id-->
                        <div class="form-group{{ $errors->has('prof_id') ? ' has-error' : '' }}">
                            <label for="prof_id" class="col-md-4 control-label">Proficiency</label>
                            <div class="col-md-6">
                                        <select class="form-control" id="prof_id" name="prof_id">
                                        @foreach ($proficiencies as $Proficiency)
                                            <option value="{{$Proficiency->id}}"> {{ $Proficiency->name }} </option>
                                        @endforeach
                                        </select>   
                                @if ($errors->has('prof_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('prof_id') }}</strong>
                                    </span> 
                                @endif
                            </div>
                        </div>
                        <!-- user_id-->
                        <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                            <label for="user_id" class="col-md-4 control-label">Doctor</label>
                            <div class="col-md-6">             
                                    <select class="form-control" id="user_id" name="user_id" place>
                                         @foreach ($users as $user)
                                            @if ($user->hasRole('Doctor'))
                                                @php $doctors[] = $user; @endphp                              
                                            @endif                        
                                        @endforeach
                                    @if (empty($doctors))                                
                                            <option value="" disabled selected>No Doctor Avaiable</option>
                                    @else
                                        @foreach ($doctors as $user)
                                                <option value="{{$user->id}}"> {{$user->name}}</option>
                                        @endforeach        
                                    @endif  
                                        </select>   
                                @if ($errors->has('Doctor'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Doctor') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- Submit --}}
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Attach
                                </button>
                                </button>
                                <a href="/help/proficiency/home">
                                <button type="button" class="btn btn-warning " >
                                Back
                                    </button>
                                    <a/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
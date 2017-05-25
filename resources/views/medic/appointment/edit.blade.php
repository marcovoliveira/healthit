@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Perform an Appointment</div>
                <div class="panel-body">

                  <!--Nome-->
                       <form class="form-horizontal">  
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Pacient Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control"value="{{$appointment->name}}" disabled >
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Pacient Name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                
                       
                         <!-- Numero sns-->
                        <div class="form-group{{ $errors->has('sns') ? ' has-error' : '' }}">
                            <label for="sns" class="col-md-4 control-label">Social Security Number</label>

                            <div class="col-md-6">
                                <input id="sns" type="number" class="form-control" name="sns" value="{{$appointment->sns}}" disabled>

                                @if ($errors->has('sns'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Social Security Number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                    
                        <!-- especialidade-->
                        <div class="form-group{{ $errors->has('especialidade') ? ' has-error' : '' }}">
                            <label for="especialidade" class="col-md-4 control-label">Proficiency</label>
                            <div class="col-md-6">
                                        <select class="form-control" id="especialidade" name="especialidade" 
                                        placeholder="{{$appointment->especialidade}}" value="" disabled>
                                            <option>{{$appointment->especialidade}}</option>
                                        </select>   
                                @if ($errors->has('especialidade'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Proficiency') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- Hora e data consulta-->
                        <div class="form-group{{ $errors->has('data') ? ' has-error' : '' }}">
                            <label for="data" class="col-md-4 control-label">Appointment Date</label>

                            <div class="col-md-6">
                                
                                

                                <input id="data" type="datetime-local" class="form-control" name="data" value="<?= str_replace(' ', 'T', $appointment->data)?>" disabled>

                                @if ($errors->has('data'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('data') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                   

                         </form>
                    <form class="form-horizontal" role="form" method="POST" action="/medic/home/appointment/{{$appointment->id}}">
                        {{ csrf_field() }}
                        

                        <!--Sintomas-->
                
                       
                        <div class="form-group{{ $errors->has('sintomas') ? ' has-error' : '' }}">
                            <label for="sintomas" class="col-md-4 control-label">Sintomas</label>

                            <div class="col-md-6">
                                <textarea name="sintomas" cols="40" rows="5" id="sintomas" type="text" class="form-control"  required autofocus></textarea>
                                @if ($errors->has('sintomas'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sintomas') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <!--Diagnostico-->
                           <div class="form-group{{ $errors->has('diagnostico') ? ' has-error' : '' }}">
                            <label for="diagnostico" class="col-md-4 control-label">Diagnostico</label>

                            <div class="col-md-6">
                                <textarea name="diagnostico" cols="40" rows="5" id="diagnostico" type="text" class="form-control"  required autofocus></textarea>
                                
                                @if ($errors->has('diagnostico'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('diagnostico') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>       
                       
                      
                        {{-- Submit --}}
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save Appointment
                                </button>
                                <a href="/medic/appointment/home">
                                <button type="button" class="btn btn-warning " >
                                Back
                                    </button>
                                    <a/>
                                     </form>
                            </div>
                        </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
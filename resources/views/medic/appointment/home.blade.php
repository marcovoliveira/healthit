@extends('layouts.app')
     @section('content')
     <style>
     </style>
            <div class="container">
                <div class="panel panel-default">
                    <div class="panel-heading">Appointments
                    <a href="{{ url('/medic/home') }}" button type="button" class="btn btn-primary btn-sm" >
                     Home Doctor</button></a>
                    </div>
                         <div class="panel-body">
                            <div class="col-md-15 text-right">    
                                <form class="form-inline my-2 my-lg-0" >
                                    <form  method="get">
                                    <input class="form-control mr-sm-2" type="text" placeholder="Search" name="s"
                                    values=" {{ isset($s) ? $s : '' }} ">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>                  
                                </form>
                                    </form>        
                               </div>  
                                <p>
                                <div style="overflow-x:auto;">
                            <table class="table table-striped table-responsive" id="myTable" >
                                    <thead>
                                        <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>SNS</th>
                                        <th>Date</th>
                                        <th>Proficiency</th>
                                        <th>Doctor</th>
                                        <th>Estado</th>
                                        <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    @foreach ($appointments as $appointment)
                                        <tr>
                                        <th scope="row">{{$appointment->id}}</th>
                                        <td>{{$appointment->name}}</td>
                                        <td>{{$appointment->sns}}</td>
                                        <td>{{$appointment->data}}</td>
                                        <td>{{$appointment->especialidade}}</td>
                                        <td>{{$appointment->user->name}}</td>
                                         
                                            @if ($appointment->realizada == 0)
                                                <td>Em espera</td>
                                            @else 
                                                <td>Realizada</td>
                                            @endif
                                            
                                            
                                        @if ($appointment->realizada == 0)
                                        <td>
                                         <a href="edit/{{$appointment->id}}" button type="button" class="btn btn-primary btn-sm" >Perform</button>
                                        </td>
                                         <td>
                                        <a href="/medic/home/appointment/show/{{$appointment->id}}" button type="button" class="btn btn-success btn-sm" >View</button>
                                        </td>
                                        @elseif ($appointment->realizada == 1)
                                        <td><a button type="button" class="btn btn-primary btn-sm" disabled>Perform</button>
                                        </td>
                                        <td>
                                        <a href="/medic/home/appointment/show/{{$appointment->id}}" button type="button" class="btn btn-success btn-sm" >View</button>
                                        </td>
                                        @endif
                                       
                                        </tr>
                                    @endforeach
                                   
                                    </tbody>
                                     
                            </table>
                            </div>
                            {{ $appointments->appends(['s' => $s])->links() }}
                        </div>
                    </div>
            </div>

<!--            <script>
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>-->
@endsection
@extends('layouts.app')
     @section('content')
     <style>
     </style>
            <div class="container">
                <div class="panel panel-default">
                    <div class="panel-heading">Proficiency
                    <a href="{{ url('/help/home') }}" button type="button" class="btn btn-primary btn-sm" >
                     Home Helpdesk</button></a>
                    </div>
                         <div class="panel-body">
                            <div class="col-md-15 text-right">    
                                <form class="form-inline my-2 my-lg-0" >
                                <a href="{{ url('/help/proficiency/attach') }}" button type="button" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span>
                                    Attach Proficiency to a Doctor
                                    </button></a>  
                                <a href="{{ url('/help/proficiency/register') }}" button type="button" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span>
                                    Create a Proficiency
                                    </button></a>   
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
                                        <th>Created At</th>
                                        <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($proficiencies as $proficiency)
                                        <tr>
                                        <th scope="row">{{$proficiency->id}}</th>
                                        <td>{{$proficiency->name}}</td>
                                        <td>{{$proficiency->created_at}}</td>
                                        <td>
                                         <a href="edit/{{$proficiency->id}}" button type="button" class="btn btn-primary btn-sm" >Edit</button>
                                        </td>
                                         <td>
                                        <a href="/help/home/proficiency/delete/{{$proficiency->id}}" button type="button" class="btn btn-danger btn-sm" >Delete</button>
                                        </td>
                                        </tr>     
                                        @endforeach
                                        </tbody> 
                            </table>
                            </div>
                            {{ $proficiencies->appends(['s' => $s])->links() }}
                        </div>
                    </div>
            </div>

            <script>
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
</script>
@endsection
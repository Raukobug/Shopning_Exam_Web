@extends('layouts.master')

@section('content')
<div class="row">
        <div class="col-xs-12">
          <div class="box">
		  			   
            <div class="box-header">
               <h3 class="box-title"></h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search" id="myInput" onkeyup="myFunction()">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>

            </div>

            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" id="myTable">
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Email</th>
				  <th>Phone</th>
				  <th>Shop</th>
				  <th></th>
                </tr>
@foreach ($users as $user)
                <tr>
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->phone }}</td>
                  <td>{{ $user->shop['name'] }}</td>
				  <td style="text-align:right;" width="50%"><a href="/users/edit/{{ $user->id }}" class="fa fa-edit"></a> <a href="/users/{{ $user->id }}/removeUser" class="fa fa-trash"></a></td>
                </tr>
@endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
@endsection

@section('title')
Products
@endsection

@section('bredcrum')
	<li><a href="/users"><i class="fa fa-home"></i>Users</a></li>
@endsection

@section('javaScripts')
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
	  for(l = 0; l < 5; l++){
		td = tr[i].getElementsByTagName("td")[l];
		if (td) {
		  if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
			tr[i].style.display = "";
			break;
		  } else {
			tr[i].style.display = "none";
		  }
		}		  
	  }

  }
}
</script>
@endsection

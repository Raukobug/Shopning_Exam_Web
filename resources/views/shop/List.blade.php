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
				  <th></th>
                </tr>
@foreach ($shops as $shop)
                <tr>
                  <td>{{ $shop->id }}</td>
                  <td>{{ $shop->name }}</td>
                  <td>{{ $shop->email }}</td>
				  <td style="text-align:right;" width="50%"><a href="/shops/active/{{ $shop->id }}" class="fa <?php echo ($shop->id == Session::get('shopId') ? 'fa-star' : 'fa-star-o'); ?>"></a> <a href="/shops/edit/{{ $shop->id }}" class="fa fa-edit"></a> <a href="/shops/{{ $shop->id }}/removeShop" class="fa fa-trash"></a></td>
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
	<li><a href="/shops"><i class="fa fa-home"></i>Shops</a></li>
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
	  for(l = 0; l < 3; l++){
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

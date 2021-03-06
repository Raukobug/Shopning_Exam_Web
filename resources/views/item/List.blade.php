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
                  <th>Price</th>
                  <th>Expiry Date</th>
                  <th>Quantity Left</th>
                  <th>Status</th>
				  <th></th>
                </tr>
@foreach ($wares as $ware)
<?php 
if($ware->discount != 0){
	$status = '<span class="label label-warning">Discount</span>';
}
else if($ware->offer != 0){
	$status = '<span class="label label-success">Offer</span>';
}
else{
	$status = '<span class="label label-primary">Normal</span>';	
}
 ?>
                <tr>
                  <td>{{ $ware->id }}</td>
                  <td>{{ $ware->product->name }}</td>
                  <td>{{ $ware->price }},-</td>
                  <td>{{ $ware->expirationdate }}</td>
				  <td>{{ $ware->quantity-$ware->sold }}</td>
                  <td>{!! $status !!}</td>
				  <td style="text-align:right;" width="50%"><a href="/wares/edit/{{ $ware->id }}" class="fa fa-edit"></a> <a href="/wares/{{ $ware->id }}/removeItem" class="fa fa-trash"></a></td>
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
	<li><a href="#"><i class="fa fa-shopping-cart"></i>Products</a></li>
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
	  for(l = 0; l < 6; l++){
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

@extends('layouts.master')

@section('content')
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
               <h3 class="box-title"></h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
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
@endsection

@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST">
                        {{ csrf_field() }}
						
						<div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                            <label for="quantity" class="col-md-4 control-label">Quantity</label>

                            <div class="col-md-6">
                                <input id="quantity" type="number" class="form-control" name="quantity" value="{{ $item->quantity }}" required autofocus>

                                @if ($errors->has('quantity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-4 control-label">Price</label>

                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control" name="price" value="{{ $item->price }}" required autofocus>

                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

						<div class="form-group{{ $errors->has('offer') ? ' has-error' : '' }}">
                            <label for="offer" class="col-md-4 control-label">Offer</label>

                            <div class="col-md-6">
                                <input id="offer" type="number" class="form-control" name="offer" value="{{ $item->offer }}" required autofocus>

                                @if ($errors->has('offer'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('offer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

						<div class="form-group{{ $errors->has('discount') ? ' has-error' : '' }}">
                            <label for="discount" class="col-md-4 control-label">Discount (In %)</label>

                            <div class="col-md-6">
                                <input id="discount" type="number" class="form-control" name="discount" value="{{ $item->discount }}" required autofocus>

                                @if ($errors->has('discount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('discount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>						
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('title')
Products
@endsection

@section('bredcrum')
	<li><a href="/wares"><i class="fa fa-shopping-cart"></i>Products</a></li>
	<li class="active">Update</li>
@endsection

@section('javaScripts')
@endsection

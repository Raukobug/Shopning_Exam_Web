@extends('layouts.master')

@section('bredcrum')
         <li><a href="#"><i class="fa fa-users"></i>Users</a></li>
         <li class="active">Create</li>
@endsection

@section('title')
         Create new user
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label for="firstname" class="col-md-4 control-label">Firstname</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required autofocus>

                                @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						<div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="lastname" class="col-md-4 control-label">Lastname</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required autofocus>

                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
@if ( Auth::user()->access_level_id == 1)
<!-- Select Role -->	
						<div class="form-group{{ $errors->has('accessLevel') ? ' has-error' : '' }}">
                            <label for="accessLevel" class="col-md-4 control-label">Role</label>

                            <div class="col-md-6">
	<select id="accessLevel" type="text" class="form-control" name="accessLevel">
	<?php
for ($i = 0; $i < count($accessLevels); $i++){
		if (is_object($accessLevels[$i])) {
    echo '<option value="'.$accessLevels[$i]->id.'">'.$accessLevels[$i]->name.'</option>';    
    }
	
}

?>
  

</select>
                                

                                @if ($errors->has('accessLevel'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('accessLevel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

<!-- Stop Select Role -->

<!-- Select Shop -->
<div class="form-group{{ $errors->has('shops') ? ' has-error' : '' }}">
                            <label for="shops" class="col-md-4 control-label">Shop</label>						
                            <div class="col-md-6">
	<select id="shop" type="text" class="form-control" name="shop">
	<option value="0">-- Intet Valgt --</option>
	<?php
for ($i = 0; $i < count($shops); $i++){
		if (is_object($shops[$i])) {
    echo '<option value="'.$shops[$i]->id.'">'.$shops[$i]->name.'</option>';    
    }
	
}

?>
  

</select>
                                

                                @if ($errors->has('shop'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('shop') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>						

						
<!-- Stop Select Shop -->
@endif	
		
						
						
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
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

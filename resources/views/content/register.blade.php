@extends('layouts.master')

@section('title','SMACK | REGISTER')

@section('content')
	<div id="contact-page" class="container">
    	<div class="bg">	
    		<div class="row">  	
	    		<div class="col-sm-8 col-sm-offset-2">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Input Your Data for new Account</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" action="{{url('input_register')}}" enctype="multipart/form-data" class="contact-form row" name="contact-form" method="post">
				            <div class="form-group col-md-12">
				                <input type="text" name="username" class="form-control" placeholder="Name of Your Outlet">
		                        @if($errors->has('username'))
		                          <div class="alert alert-danger" role="alert"> {{$errors->first('username')}} </div>
		                        @endif
				            </div>
				            <div class="form-group col-md-12">
				                <input type="email" name="email" class="form-control" placeholder="E-mail">
		                        @if($errors->has('email'))
		                          <div class="alert alert-danger" role="alert"> {{$errors->first('email')}} </div>
		                        @endif
				            </div>
				            <div class="form-group col-md-6">
				                <input type="password" name="password" class="form-control" placeholder="Password">
		                        @if($errors->has('password'))
		                          <div class="alert alert-danger" role="alert"> {{$errors->first('password')}} </div>
		                        @endif
				            </div>
				            <div class="form-group col-md-6">
				                <input type="password" name="confirm_password" class="form-control" placeholder="Password Confirmation">
		                        @if($errors->has('confirm_password'))
		                          <div class="alert alert-danger" role="alert"> {{$errors->first('confirm_password')}} </div>
		                        @endif
				            </div>
				            <div class="form-group col-md-12">
				                <label>Upload Photo : <input type="file" name="photo" ></label>
		                        @if($errors->has('photo'))
		                          <div class="alert alert-danger" role="alert"> {{$errors->first('photo')}} </div>
		                        @endif
				            </div>                    
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
				            </div>
				            {{csrf_field()}}
				        </form>
	    			</div>
	    		</div>			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->

	@endsection
@extends('layouts.layout')
@section('content')
{{ HTML::script('resources/assets/js/shopping.js') }}
{{ HTML::script('resources/assets/js/common.js') }}
{{ HTML::script('resources/assets/js/lib/additional-methods.min.js') }}
		@if(Session::has('success'))
		<div align="center" class="alertboxalign ml500" role="alert" style="width:200px !important;">
	        <p class="alert {{ Session::get('alert', Session::get('type') ) }}">
	        {{ Session::get('success') }}
	        </p>
	    </div>
	    @endif
	{{ Form::open(array('name'=>'login', 
                            'id'=>'login', 
                            'url' => 'loginusers',
                            'files'=>true,
                            'method' => 'POST')) }}
    <div class="col-xs-12 mt5">
        <div class="col-xs-4 text-right clr_blue">
            <label>User Name<span class="fr ml2 red"> * </span>
            </label>
        </div>
        <div class="col-xs-2 pm0">
            {{Form::text('username','',array(                    
                            'class'=>'pl5',                     
                            'id'=>'username',
                            'data-label' => 'User Name',
                            'onkeypress'=>'return event.charCode >=6 && event.charCode >=58',
                            'name'=>'username'))}}
        </div>
    </div>
    <div class="col-xs-12 mt5">
        <div class="col-xs-4 text-right clr_blue">
            <label>Password<span class="fr ml2 red"> * </span>
            </label>
        </div>
        <div class="col-xs-2 pm0">
            {{Form::password('password','',array(                    
                            'class'=>'pl5',                     
                            'id'=>'password',
                            'data-label' => 'Password',
                            'name'=>'password'))}}
        </div>
    </div>
    <div class="col-sm-11">
        <button type="submit" class="btn btn-warning add box100 editprocess ml15"> Login
        </button>
        &emsp;New User?
	    <a onclick="javascript:register();" class="btn btn-danger box120 white"><i class="fa fa-times"  aria-hidden="true"></i> Register
	    </a>
        </div>
    {{ Form::close() }}
@endsection
@extends('layouts.layout')
@section('content')
{{ HTML::script('resources/assets/js/shopping.js') }}
{{ HTML::script('resources/assets/js/common.js') }}
{{ HTML::script('resources/assets/js/lib/additional-methods.min.js') }}
	{{ Form::open(array('name'=>'productdetail', 
                            'id'=>'productdetail', 
                            'url' => 'registerusers',
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
            <label>Phone<span class="fr ml2 red"> * </span>
            </label>
        </div>
        <div class="col-xs-2 pm0">
            {{Form::text('phone','',array(                    
                            'class'=>'pl5',                     
                            'id'=>'phone',
                            'data-label' => 'phone',
                            'name'=>'phone',
                            'onkeypress'=>'return event.charCode >=6 && event.charCode <=58',
                            'ondragstart'=>'return false',
                            'ondrop'=>'return false',
                            'maxlength'=>'10'))}}
        </div>
    </div>
    <div class="col-xs-12 mt5">
        <div class="col-xs-4 text-right clr_blue">
            <label>Mail<span class="fr ml2 red"> * </span>
            </label>
        </div>
        <div class="col-xs-2 pm0">
            {{Form::text('mail','',array(                    
                            'class'=>'pl5',                     
                            'id'=>'mail',
                            'data-label' => 'mail',
                            'name'=>'mail'))}}
        </div>
    </div>
    <div class="col-xs-12 mt5">
        <div class="col-xs-4 text-right clr_blue">
            <label>Gender<span class="fr ml2 red"> * </span>
            </label>
        </div>
        <div class="col-xs-2 pm0">
            <label class="fwn">
            {{ Form::radio('gender', '1','',array('id' =>'male',
                            'name' => 'gender',
                            'class' => 'comp',
                            'data-label' => 'gender'))}}
            <span class="vam">&nbsp;Male&nbsp;</span>
            </label>
            <label class="fwn">
            {{ Form::radio('gender', '2','',array('id' =>'female',
                            'name' => 'gender',
                            'class' => 'ntcomp',
                            'data-label' => 'gender'))}}
            <span class="vam">&nbsp;Female&nbsp;</span>
            </label>
        </div>
    </div>
    <div class="col-sm-11">
        <button type="submit" class="btn btn-warning add box100 editprocess ml15"> Register
        </button>
        &emsp;Exsisting User?
	    <a onclick="javascript:login();" class="btn btn-danger box120 white"><i class="fa fa-times"  aria-hidden="true"></i> Login
	    </a>
        </div>
    {{ Form::close() }}
@endsection
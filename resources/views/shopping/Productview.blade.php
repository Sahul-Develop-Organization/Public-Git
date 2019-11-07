@extends('layouts.layout')
@section('content')
{{ HTML::script('resources/assets/js/shopping.js') }}
{{ HTML::script('resources/assets/js/common.js') }}
{{ HTML::script('resources/assets/js/lib/additional-methods.min.js') }}
	  <h3 align="center">Shopping Page</h3>
      {{ Form::open(array('name'=>'productbuy', 
                            'id'=>'productbuy', 
                            'url'=>'Productbuy',
                            'files'=>true,
                            'method' => 'POST')) }}
        @foreach($single as $all)
        {{Form::hidden('cartid','cartid',array('id'=>'cartid'))}}
        {{Form::hidden('hidid',$all->id ,array('id'=>'hidid'))}}
        {{Form::hidden('cartid',$all->productId,array('id'=>'cartid'))}}
            <div class="media">
              <div class="media-left">
                <div class="col-sm-8 ml5">
                  <img width="250" height="300" name="empimg" id="empimg" class="ml5 box100 media-object viewPic3by2" src="{{URL::asset('../../../../Shopping/Images').'/'.$all->image }}">
                </div>  
              </div>
              <div class="media-body">
                <div class="col-sm-2">
                    <h4 class="media-heading"><label>{{$all->productName}}</label></h4>
                </div>
                <div class="col-sm-4">
                    <h4 class="pull-right"><label>Rs.{{$all->price}}</label></h4>
                </div>
                <div class="col-sm-12"></div>
                <div class="col-sm-4">
                    <p>-{{$all->Ram}} {{$all->Rom}} {{$all->expand}}</p>
                </div><div class="col-sm-12"></div>
                <div class="col-sm-4">
                  <p>-{{$all->description}}</p>
                  <p>-{{$all->processor}}</p>
                </div><div class="col-sm-12"></div>
                <!-- <div class="col-sm-4">
                  <label>Quantity</label>
                  {{ Form::number('quantity','1',array('type'=>'number',
                                                      'id'=>'quantity',
                                                      'min'=>'1',
                                                      'max'=>'5')) }}
                </div> -->
                </div>
              </div>
            </div>
        @endforeach
        <div class="col-sm-8">
          <button type="submit" class="btn btn-warning add box100 editprocess ml15">
              <i class="fa fa-plus" aria-hidden="true"></i> Buy Now
          </button>
          <a onclick="javascript:addtocart('{{ $all->productId }}');" class="btn btn-danger box120 white"><i class="fa fa-times"  aria-hidden="true"></i> Add to cart
          </a>
        </div>
 	    {{Form::close()}}
@endsection
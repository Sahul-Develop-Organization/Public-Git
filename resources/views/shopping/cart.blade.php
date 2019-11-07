@extends('layouts.layout')
@section('content')
{{ HTML::script('resources/assets/js/shopping.js') }}
{{ HTML::script('resources/assets/js/common.js') }}
{{ HTML::script('resources/assets/js/lib/additional-methods.min.js') }}
          @if(isset($viewflag) && ($viewflag == 1))
          <div style="padding-right: 10px;">
            <a onclick="javascript:purchasedproduct();" class="btn btn-info pull-right"> Purchased Products
            </a>
          </div>
          @endif
        <h1 align="center">Cart Page</h1>
      {{ Form::open(array('name'=>'placeorder', 
                            'id'=>'placeorder', 
                            'url'=>'placeorder',
                            'files'=>true,
                            'method' => 'POST')) }}
        {{Form::hidden('delid','delid',array('id'=>'delid'))}}
        {{Form::hidden('hidid','hidid',array('id'=>'hidid'))}}
        @if($cart)
        @foreach($cart as $all)
        <?php $dob=$all->CreatedDateTime;
        $date=date('d',strtotime($dob));?>
        {{Form::hidden('hiddate',$date,array('id'=>'hiddate'))}}
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
                </div>
                <div class="col-sm-12"></div>
                <div class="col-sm-4">
                  <a onclick="javascript:continueshop();" class="btn btn-info white"><i class=""  aria-hidden="true"></i> Continue Shopping
                  </a>
                  <a onclick="javascript:placeordered('{{ $all->productId }}');" class="btn btn-warning box120 white"><i class=""  aria-hidden="true"></i> Placeorder
                  </a>
                  <a onclick="javascript:removefromcart('{{ $all->id }}');" class="btn btn-danger box120 white"><i class=""  aria-hidden="true"></i> Remove
                  </a>
                </div>
                </div>
              </div>
            </div>
        @endforeach
        @else
          <h3><label>No items in cart</label></h3>
        @endif
 	    {{Form::close()}}
@endsection
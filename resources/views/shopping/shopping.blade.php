@extends('layouts.layout')
@section('content')
{{ HTML::script('resources/assets/js/shopping.js') }}
      {{ Form::open(array('name'=>'productdetail', 
                            'id'=>'productdetail', 
                            'url'=>'Productdetail',
                            'files'=>true,
                            'method' => 'POST')) }}
        {{Form::hidden('hidid','hidid',array('id'=>'hidid'))}}
        @if(Session::has('userid')=='')
          <div class="col-sm-1 pull-left">
            <a onclick="javascript:login();" class="btn btn-default box120 black"><i class="glyphicon glyphicon-user"  aria-hidden="true"></i> Login
            </a>
          </div>
        @endif
        <div class="col-sm-1 pull-right">
          <a onclick="javascript:viewcart();" class="btn btn-info box120 white"><i class="glyphicon glyphicon-shopping-cart"  aria-hidden="true"></i> Cart
          </a>
        </div>
                <h1 align="center"><label>Shopping Page</label></h1>
        <div id="myCarousel" class="carousel slide" data-ride="carousel" style="max-width:1500px; max-height:400px !important;">
          <div class="carousel-inner">
            <div class="item active">
                <img src="resources/assets/img/BR001.jpg" style="width:1500px; max-height:400px !important;">
            </div>
            @foreach($allproducts as $all)
            @if($all->bimage != '')
            <div class="item">
                <img src="{{URL::asset('../../../../Shopping/Images').'/'.$all->bimage }}" style="width:1500px; max-height:400px !important;">
            </div>
            @endif
            @endforeach
          </div>
            <!-- @if(Session::has('cartproduct')!='')
                @foreach(Session::get('cartproduct') as $cart)
                  <?php print_r($cart); ?>
                @endforeach
            @endif -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev" style="width:80px !important;">
              <span class="glyphicon glyphicon-chevron-left"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next" style="width:80px; max-height:400px !important;">
              <span class="glyphicon glyphicon-chevron-right"></span>
              <span class="sr-only">Next</span>
            </a>
           
        </div>  
             @foreach($allproducts as $all)
                <div class="col-sm-3">
                  <a href="javascript:singleview({{$all->id}})">
                  <img width="200" height="300" name="empimg" id="empimg" class="ml5 box100 viewPic3by2" src="{{URL::asset('../../../../Shopping/Images').'/'.$all->image }}">
                  <br>
                    <label class="fs13">{{$all->productName}}</label>
                  </a>
                    
                </div>
            @endforeach
 	    {{Form::close()}}
@endsection
@extends('layouts.layout')
@section('content')
{{ HTML::script('resources/assets/js/shopping.js') }}
{{ HTML::script('resources/assets/js/common.js') }}
{{ HTML::script('resources/assets/js/lib/additional-methods.min.js') }}
	@if(Session::has('userid'))
        <div align="center" class="alertboxalign" role="alert" style="width:100px !important;">
          <p class="alert {{ Session::get('alert', Session::get('type') ) }}">
          {{ Session::get('userid') }}
          </p>
        </div>
    @endif
    @php Session::forget('success'); @endphp
    @foreach($paid as $all)
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
                    <p>-{{$all->Ram}}GB|{{$all->Rom}}GB|Expandable Upto {{$all->expand}}GB</p>
                </div><div class="col-sm-12"></div>
                <div class="col-sm-4">
                  <p>-{{$all->description}}</p>
                  <p>-{{$all->processor}}</p>
                </div>
                </div>
              </div>
            </div>
        @endforeach
@endsection
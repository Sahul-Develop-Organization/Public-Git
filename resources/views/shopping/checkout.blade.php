@extends('layouts.layout')
@section('content')
{{ HTML::script('resources/assets/js/shopping.js') }}
{{ HTML::script('resources/assets/js/common.js') }}
{{ HTML::script('resources/assets/js/lib/additional-methods.min.js') }}
    <div class="col-sm-2 ml5">
        <label>
            {{ Form::radio('payment', '1','',array('id' =>'cash',
                              'name' => 'payment',
                              'class' => 'comp',
                              'onclick' => 'javascript:cashpay()',
                              'data-label' => 'Cash'))}}
              <span class="vam">&nbsp;Cash&nbsp;</span>
        </label><br>
    </div>
    <div class="col-sm-2 ml5">
        <label>
              {{ Form::radio('payment', '2','', array('id' =>'card',
                              'name' => 'payment',
                              'class' => 'ntcomp',
                              'onclick' => 'javascript:cardpay()',
                              'data-label' => 'Card'))}}
              <span class="vam">&nbsp;Card&nbsp;</span>
        </label>
    </div>
    <div class="col-sm-12"></div>
  @foreach($checkout as $all)
  <div id="cashondelivery" style="display: none">
    {{ Form::open(array('name'=>'cashpayment', 
                          'id'=>'cashpayment', 
                          'url'=>'cashpayment',
                          'files'=>true,
                          'method' => 'POST')) }}
      {{Form::hidden('proid',$all->productId,array('id'=>'proid'))}}
      <?php $dob=$all->CreatedDateTime;
        $date=date('d',strtotime($dob));?>
        {{Form::hidden('hiddate',$date,array('id'=>'hiddate'))}}
      <div class="col-sm-4 ml5">
          <label>Address:</label>
          {{ Form::text('address','',array('class'=>'pl5',
                                    'id'=>'address',
                                    'data-label' => 'address',
                                    'name'=>'address')) }}<br>
        <button type="submit" class="btn btn-warning add box100 cashprocess ml15">
            <i class="fa fa-plus" aria-hidden="true"></i> Place Order
        </button>                   
      </div>
    {{ Form::close() }}
  </div>
  <div id="cardpayment" style="display: none">
    {{ Form::open(array('name'=>'cardpayment', 
                          'id'=>'cardpayment', 
                          'url'=>'cardpayment',
                          'files'=>true,
                          'method' => 'POST')) }}
      {{Form::hidden('proid',' $all->productId ',array('id'=>'proid'))}}
      <?php $dob=$all->CreatedDateTime;
       $date=date('d',strtotime($dob));?>
        {{Form::hidden('hiddate',$date,array('id'=>'hiddate'))}}
      <div class="col-sm-4 ml5">
          <label>Address:</label>
                    {{ Form::text('address','',array('class'=>'pl5',
                                    'id'=>'address',
                                    'data-label' => 'address',
                                    'name'=>'address')) }}<br>
          <label style="padding: 10px;">CCv:</label>
                    {{ Form::text('ccv','',array('class'=>'pl5',
                                    'id'=>'ccv',
                                    'data-label' => 'ccv',
                                    'name'=>'ccv')) }}<br>
        <button type="submit" class="btn btn-warning add box100 cardprocess ml15">
            <i class="fa fa-plus" aria-hidden="true"></i> Place Order
        </button>                   
      </div>
    {{ Form::close() }}
  </div>
  @endforeach
@endsection
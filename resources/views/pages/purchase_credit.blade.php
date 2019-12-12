@extends('layouts.default')

@section('inner-banner')
    <div class="row-fluid inner-top">
        <div class="span6 inner-content"><h2>About</h2>
            <p>We have a great story, and we'd love to tell you about it. By the way, did you watch the original
                Foldagram video on the front page?</p>
        </div>
        <img src="{{ asset('img/inner-folder.png') }} " alt="inner-folder">
    </div>
@stop

@section('content')
    <div class="row price">
        <div class="span6 well price_content"><h3>Current Price</h3>
            <p>Foldagrams can either be purchased one at a time, or with credits. When you pay for credits in advance,
                you receive a discount. Don't worry, you don't have to use them all at once! The prices shown already
                include postage.</p>
            @if($credit)
                <ul>
                    @foreach($credit as $value)
                        <li>{{ $value->rfrom ." - ". $value->rto ." Foldagrams - $".$value->price." each" }}</li>
                    @endforeach
                </ul>
            @endif </div>
        <div class="span6">
            {{ Form::open( array ( 'url'=>'purchasecredit/addtocredit')) }} <h3>Purchase Credit</h3>
            <br/> {{ Form::token() }} {{ Form::label('qty', 'Foldagrams:') }}
            <br/> {{ Form::label('qty', 'Quantity ') }}
            {{ Form::text('qty', '1', ['onchange' => 'updatePlanName()']) }}&nbsp;
            &nbsp; {{ Form::label('price', 'Per Foldagram') }} {{ Form::text('price','', array('id'=>'price', 'readonly'=>'readonly')) }}
            &nbsp;
            &nbsp; {{ Form::label('total', 'Total') }} {{ Form::text('total', '', array('id'=>'total', 'readonly'=>'readonly')) }}
            <br/> <br/> {{ Form::submit('Add to Cart',array("class"=>"btn-large ")) }} {{ Form::close() }} </div>
    </div>
@stop

<script type="text/javascript">
    function updatePlanName() {
        //TODO: fix this mess
        var qty = $('#qty').val();
        var url = '{{url('price')}}' + '/' + qty;
        $.ajax({
            url: url,
            type: 'post',
            data: {
                "_token": '{{csrf_token()}}',
            },
            success: function (data) {
                // alert('Update image success!');
                $('#price').val(data);
            },
            error: function (data) {
                console.log(data);
                alert('error!');
            },
        });
    }</script>

@extends('layouts.user')

@section('inner-banner')
    <div class="row-fluid inner-top">
        <div class="span6 inner-content">
            <h2>{{ '$page_title' }}</h2>
            <p>So glad you're here. I'm sure you know what to do.</p>
        </div>
        <img src="{{ asset('img/inner-folder.png') }}" alt="inner-folder">
    </div>
@stop

@section('content')
    <div class="span12 dcontent">
        {{ Form::open( array('url'=>'register') ) }}
        <div class="control-group">
            <label class="control-label" for="name">Name :</label>
            <div class="controls">
                <input type="text" name="name" class="input-xxlarge" id="name"
                       value="{{ old('name') }}" placeholder="">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="username">Username :</label>
            <div class="controls">
                <input type="text" name="username" class="input-xxlarge" id="username"
                       value="{{ old('username') }}" placeholder="">

            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="rto">Email * :</label>
            <div class="controls">
                <input type="text" name="email" class="input-xxlarge" id="email" value="{{ old('email') }}"
                       placeholder="">

            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="password">Password * :</label>
            <div class="controls">
                <input type="password" name="password" class="input-xxlarge" id="password"
                       value="{{ old('password') }}" placeholder="">

            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="password">Confirm Password * :</label>
            <div class="controls">
                <input type="password" name="password_confirmation" class="input-xxlarge" id="password_confirmation"
                       value="{{ old('password_confirmation') }}" placeholder="">

            </div>
        </div>

        <button type="submit" class="btn btn-large">Register</button>

        {{ Form::close() }}
    </div>
@stop

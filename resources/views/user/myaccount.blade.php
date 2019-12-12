@extends('layouts.user')

@section('content')
    <div class="span12 dcontent">
        <div class="tabbable">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1" data-toggle="tab">My Profile</a></li>
                <li><a href="#tab2" data-toggle="tab">Change Password</a></li>
                <li><a href="#tab3" data-toggle="tab">My Orders</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab1"> {{ Form::open( array( 'url' => '/myaccount/profile') ) }}
                    <div class="control-group"><label class="control-label" for="name">Name :</label>
                        <div class="controls"><input type="text" name="name" id="name"
                                                     value="{{ Auth::user()->name }}" placeholder=""></div>
                    </div>
                    <div class="control-group"><label class="control-label" for="username">Username :</label>
                        <div class="controls"><input type="text" name="username" id="username"
                                                     value="{{ Auth::user()->username }}" placeholder=""></div>
                    </div>
                    <div class="control-group"><label class="control-label" for="email">Email :</label>
                        <div class="controls"><input type="text" name="email" id="email" value="{{ Auth::user()->email }}"
                                                     placeholder=""></div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div> {{ Form::close() }} </div>
            </div>
        </div>
    </div>
@stop

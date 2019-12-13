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
                <div class="tab-pane active" id="tab1">
                    {{ Form::open( array( 'url' => '/myaccount/profile') ) }}
                    <div class="control-group"><label class="control-label" for="name">Name :</label>
                        <div class="controls"><input type="text" name="name" id="name"
                                                     value="{{ Auth::user()->name }}" placeholder=""></div>
                    </div>
                    <div class="control-group"><label class="control-label" for="username">Username :</label>
                        <div class="controls"><input type="text" name="username" id="username"
                                                     value="{{ Auth::user()->username }}" placeholder=""></div>
                    </div>
                    <div class="control-group"><label class="control-label" for="email">Email :</label>
                        <div class="controls"><input type="text" name="email" id="email"
                                                     value="{{ Auth::user()->email }}"
                                                     placeholder=""></div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    {{ Form::close() }} </div>
            </div>

            <div class="tab-pane" id="tab2">
                {{ Form::open( array('url' => 'myaccount/changepassword') ) }}
                <div class="control-group"><label class="control-label" for="old_password">Old Password :</label>
                    <div class="controls"><input type="password" name="old_password" id="old_password" value=""
                                                 placeholder=""></div>
                </div>
                <div class="control-group"><label class="control-label" for="password">New Password :</label>
                    <div class="controls"><input type="password" name="password" id="password"
                                                 value="{{ old('password') }}" placeholder=""></div>
                </div>
                <div class="control-group"><label class="control-label" for="password">Confirm New Password :</label>
                    <div class="controls"><input type="password" name="password_confirmation" id="password_confirmation"
                                                 value="{{ old('password_ confirmation') }}" placeholder="">
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                {{ Form::close() }}
            </div>

            <div class="tab-pane" id="tab3"><h3>My Order</h3>
                <table class="table table-striped table-bordered table-condensed ">
                    <thead>
                    <tr>
                        <th>Message</th>
                        <th>Picture</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($orders) >= 1)
                        @foreach($orders as $value)
                            <tr>
                                <td>{{ $value->message }}</td>
                                <td>
                                    @if($value->image!="")
                                        @if(File::exists(path('public').'img/thumbnails/'.$value->image))
                                            {{ HTML::image('img/thumbnails/'.$value->image, "Foldagram Image", array('width'=>'100px')) }}
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @if($value->status=='1')
                                        {!! Form::label('status', $value->status) !!}
                                    @elseif ($value->status=='2')
                                        {!! Form::label('status', $value->status) !!}
                                    @elseif ($value->status=='3')
                                        {!! Form::label('status', $value->status) !!}
                                    @elseif ($value->status=='4')
                                        {!! Form::label('status', $value->status) !!}
                                    @elseif ($value->status=='5')
                                        {!! Form::label('status', $value->status) !!}
                                    @elseif ($value->status=='6')
                                        {!! Form::label('status', $value->status) !!}
                                    @elseif ($value->status=='7')
                                        {!! Form::label('status', $value->status) !!}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3" class="sr-align-center" style="text-align: center">There is any order</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@stop

<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class pagesController extends Controller
{
    public function Myaccount()
    {
        return view("user.myaccount")
            ->with("title", "The Foldagram - My Account")
            ->with("page_title", "My Account")
            ->with('class', 'myaccount');
    }

    function postProfile()
    {
        $rules = array(
            'email' => 'required|email|unique:users,email',
        );

        $input      = Input::all();
        $validation = \Validator::make($input, $rules);

        if ($validation->fails()) {
            return \Redirect::to('myaccount')->withInput()->withErrors($validation);
        }

        $user_data = array(
            'email'      => Input::get('email'),
            'first_name' => Input::get('first_name'),
            'last_name'  => Input::get('last_name'),
        );

        $user = User::find(\Auth::user()->id);
        if ($user->update($user_data)) {
            return \Redirect::to('myaccount')->with('success', 'Your information has been updated successfully.');
        } else {
            return \Redirect::to('myaccount')->with('error', 'Something went wrong!.');
        }

    }
}

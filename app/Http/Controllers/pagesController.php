<?php

namespace App\Http\Controllers;

use App\Credit;
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

    public function postProfile()
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

    public function changepassword()
    {
        $rules = array(
            'old_password'          => 'required',
            'password'              => 'required|different:old_password|confirmed',
            'password_confirmation' => 'required',
        );

        $input      = Input::all();
        $validation = \Validator::make($input, $rules);

        if ($validation->fails()) {
            return \Redirect::to('myaccount')->withInput()->withErrors($validation);
        }

        $password_verify = password_verify(Input::get('old_password'), \Auth::user()->getAuthPassword());
        if (!$password_verify) {
            return \Redirect::to('myaccount')->with('error', 'Your old password is not matching with your provided input.');
        }

        $user           = User::find(\Auth::user()->id);
        $user->password = \Hash::make(Input::get('password'));

        if ($user->save()) {
            return \Redirect::to('myaccount')->with('success', 'Your password  has been updated successfully.');
        } else {
            return \Redirect::to('myaccount')->with('error', 'Your password has been not update successfully.');
        }
    }

    public function get_purchase_credit()
    {
        $credit = Credit::all();

        return view("pages.purchase_credit")
            ->with("title", "The Foldagram - Purchase Credit")
            ->with("page_title", "Purchase Credit")
            ->with('class', 'pcredit')
            ->with('credit', $credit);
    }

    public function price($qty)
    {
        $credit = Credit::where('rfrom', '<=', intval($qty))
            ->where('rto', ">=", intval($qty))
            ->orderBy('rfrom', 'DESC')
            ->first();

        if ($credit) {
            return $credit->price;
        } else {
            return 0;
        }
    }
}

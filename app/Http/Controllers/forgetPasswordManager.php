<?php

namespace App\Http\Controllers;

use \App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;


class forgetPasswordManager extends Controller
{
    function forgetPassword(){
        return view("forget-password");
    }

    function forgetPasswordPost(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users',

        ]);

        $token = Str::random(64);

        DB::table('password_reset_tokens')->insert([
               'email' => $request->email,
               'token' => $token,
               'created_at' => Carbon::now()
        ]);

         Mail::send("emails.forget-password", ['token' => $token], function ($message) use ($request){
              $message->to($request->email);
              $message->subject("Reset Password");
         });
         
         return redirect()->to(route("forgert-password"))->with("sucess", "We send an code in your email to reset your password.");
         
    }

    function resetPassword($token){
        return  view("new-password", compact('token'));
    }

    function resetPasswordPost(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_reset_tokens')
        ->where([
            'email' =>$request->email,
            'token' =>$request->token
        ])->first();

        if(!$updatePassword){
            return redirect()->to(route("reset.password"))->with("error", "invalid");
        }

        User::where("email", $request->email)->update(["password" =>Hash::make($request->password)]);

        DB::table("password_reset_tokens")->where(["email" => $request->email])->delete();

        return redirect()->to(route("login"))->with("sucess", "The password has sucessfully reset");
    }


    
}

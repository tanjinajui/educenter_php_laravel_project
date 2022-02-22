<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Sentinel;
class LoginController extends Controller
{
    public function create()
    {
        return view('frontend.layouts.includes.header');
    }

    public function login(Request $request)
    {
       // all-data store check
        //return $request->all();
       try{
         
            $user = Sentinel::authenticate($request->all());
          if($user=Sentinel::check()){
            $user_type=Sentinel::getUser()->roles()->first()->slug;
            if($user_type=="admin")
            return redirect('/blogadmin');
            elseif($user_type=="student")
                return redirect('/');
             }else{
                return redirect()->back()->with('warning','Email or Password Not Matching!!');
             }
              }catch(ThrottlingException $e){
                $delay = $e->getDelay();
                $min=floor($delay/60);
                return redirect()->back()->with(['warning'=>"Your are suspended for $min minute"]); 
                }     
    }
    public function logout()
{
    Sentinel::logout();
    return redirect('/loginUser');
 }
}

<?php

namespace vRemind\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use vRemind\Http\Requests;
use vRemind\Http\Controllers\Controller;
use vRemind\User;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()) {
        	return redirect('classes');
        }
        else {
        	return view('welcome');
        }
    }

    public function dangky()
    {
        $return = $_POST;

        if($return["typeAjaxData"] == "checkMail")
        {
            //$soluong = DB::table('userremind')->where('email', $return["emailData"])->count();
            $user = User::where('email', $return["emailData"])->count();
            $soluong = $user;
            if( $soluong == 1)
            {
                $return["emailCoKhong"] = true;
            }else{
                $return["emailCoKhong"] = false;
            }
      
          
            
        }
        if($return["typeAjaxData"] == "checkLogin")
        {
           // $user = new userremind;
           // $user = DB::table('userremind')->where('email', $return["emailData"])
                                        //->where('pass', $return["passData"])->first();
           // if(!empty($user ))
           // {
          ///      
              //  $return["loginhoplekhong"] = true ;
             //   $return["userId"] = $user->id;

           // }else{
                $return["loginhoplekhong"] = false ;
           // }
            

        }
        $return["json"] = json_encode($return);
        echo json_encode($return);
    }
    


}

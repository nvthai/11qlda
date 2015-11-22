<?php

namespace vRemind\Http\Controllers;

use Illuminate\Http\Request;
use vRemind\Http\Requests;
use vRemind\Http\Controllers\Controller;
use Input;
use Response;
use Session;
use vRemind\Notification;
use Illuminate\Support\Facades\Auth;
use vRemind\User;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('classes.home');
    }

    public function rolePicker()
    {
        return view('auth.rolepicker');
    }

    public function saveRole()
    {
    	$user = User::find(Auth::id());
    	$user->role = Input::get('role');

    	if ($user->save())
    		return redirect('classes');
    }

    public function upload()
    {
    	$file = Input::file('file');
		$destinationPath = 'uploads';
		// If the uploads fail due to file system, you can try doing public_path().'/uploads' 
		$filename = str_random(12);
		$extension = Input::file('file')->getClientOriginalExtension(); 
		$link = $filename.'.'.$extension;
		//$filename = $file->getClientOriginalName();
		//$extension =$file->getClientOriginalExtension(); 
		$upload_success = Input::file('file')->move($destinationPath, $filename.'.'.$extension);
		if( $upload_success ) {
			Session::put('image', $link);
		   return redirect('classes');

		} else {
		   return Response::json('error', 400);
		}
	}

	public function send_annoucement(Request $request)
	{
		// upload hinh anh dinh kem
		$file = Input::file('file');
		$destinationPath = 'uploads';
		// If the uploads fail due to file system, you can try doing public_path().'/uploads' 
		$filename = str_random(12);
		$extension = Input::file('file')->getClientOriginalExtension(); 
		$link = $filename.'.'.$extension;
		//$filename = $file->getClientOriginalName();
		//$extension =$file->getClientOriginalExtension(); 
		$upload_success = Input::file('file')->move($destinationPath, $filename.'.'.$extension);
		Session::put('image', $link);

		$input_data = $request->all();
		$notification = new Notification;

		$notification->sender_id = Auth::user()->id;
		$notification->class_id = $input_data["toClass"];
		$notification->content = $input_data["content"];
		$notification->file = "..\uploads\\".$link;
		$notification->save();

		return redirect("classes");

	}

}

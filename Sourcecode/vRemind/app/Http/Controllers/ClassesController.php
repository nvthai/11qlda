<?php

namespace vRemind\Http\Controllers;

use Illuminate\Http\Request;
use vRemind\Http\Requests;
use vRemind\Classes;
use vRemind\Http\Controllers\Controller;
use Input;
use Response;
use Session;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$demo = 'luan huynh';
        return view('classes.home')
        ->with('demoView', $demo);
    }

    public function upload()
    {
    	$file = Input::file('file');
		$destinationPath = 'uploads';
		// If the uploads fail due to file system, you can try doing public_path().'/uploads' 
		$filename = str_random(12);
		$extension = Input::file('file')->getClientOriginalExtension(); 
		$link = Input::file('file')->getRealPath();
		//$filename = $file->getClientOriginalName();
		//$extension =$file->getClientOriginalExtension(); 
		$upload_success = Input::file('file')->move($destinationPath, $filename.'.'.$extension);
		if( $upload_success ) {
			Session::put('error', $link);
		   return redirect('classes');

		} else {
		   return Response::json('error', 400);
		}
	}

	public function download()
    {
    	$pathToFile = 'C:\Users\Mr Harrroooo\Documents\GitHub\QLDA\11qlda\Sourcecode\vRemind\uploads\YNadThL2Nj7y.jpg';
        return response()->download($pathToFile);
	}


	// --- LH ---
	// 15-11-15
	// Thêm lớp 
	public function addClass()
	{
		$strClassName = Input::get('className');
		$strClassCode = Input::get('classCode');
		if (Input::has('participant_can_reply'))
		{
			$Reply = Input::get('participant_can_reply');	
		}
		if (Input::has('message_under_13'))
		{
			$Reply = Input::get('message_under_13');	
		}
		$Public = false;
		$class = Classes::create(
            [
                'class_code' 	=> $strClassCode,
                'class_name'    => $strClassName,
                'icon'			=> 'resources/assets/img/classesAvatar/avatar_baseball.png',
                'is_public'		=> $Public,
            ]
        );
		//classes::table('classes')->insertGetId($values);
		return view('classes.home')
        ->with('demoView', $strClassName);
	}

	// --- LH ---
	// 15-11-15
	// Chỉnh sửa lớp
	public function updateClass()
	{

	}


}

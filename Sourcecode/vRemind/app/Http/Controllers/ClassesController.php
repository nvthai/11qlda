<?php

namespace vRemind\Http\Controllers;

use Illuminate\Http\Request;
use vRemind\Http\Requests;
use Illuminate\Support\Facades\Auth;
use vRemind\Classes;
use vRemind\ClassUser;
use vRemind\Http\Controllers\Controller;
use Input;
use Response;
use Session;
use vRemind\Notification;
use vRemind\User;
use Redirect;
class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    	$classes = ClassUser::where('user_id', Auth::user()->id)
							->join('classes', 'classes.id', '=', 'class_users.class_id')->get();



    	if (Session::has('sesClassId'))
    	{
    		    		// nếu không tìm được id thì gán mặc định là first 
    		$ClassId = ClassUser::where('user_id', Auth::user()->id)
    							->orwhere('class_id', Session::get('sesClassId')->class_id)
    							->join('users', 'users.id', '=', 'class_users.user_id')
    							->join('classes', 'classes.id', '=', 'class_users.class_id')->first();	
    	}
    	else
    	{
			$ClassId = ClassUser::where('user_id', Auth::user()->id)
			//->orwhere('class_id', Session::get('sesClassId')->class_id)
								->join('users', 'users.id', '=', 'class_users.user_id')
								->join('classes', 'classes.id', '=', 'class_users.class_id')->first();
	    	// gán session
			Session::put('sesClassId', $ClassId);
    	}								

    	$id = Session::get('sesClassId')->class_id;
        //return view('classes.home')
        //->with('classes', $classes);
        return redirect('classes/' . $id);
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


	public function download()
    {
    	$pathToFile = 'C:\Users\Mr Harrroooo\Documents\GitHub\QLDA\11qlda\Sourcecode\vRemind\uploads\YNadThL2Nj7y.jpg';
        return response()->download($pathToFile);
	}

	public function send_annoucement(Request $request)
	{
				// upload hinh anh dinh kem
		$link = '';
		if(Input::file('file') != null)
		{
			$file = Input::file('file');
			$destinationPath = 'uploads';
			// If the uploads fail due to file system, you can try doing public_path().'/uploads' 
			$filename = str_random(12);
			$extension = Input::file('file')->getClientOriginalExtension(); 
			$link = "..\uploads\\".$filename.'.'.$extension;
			$upload_success = Input::file('file')->move($destinationPath, $filename.'.'.$extension);
			Session::put('image', $link);
		}

		$input_data = $request->all();
		$notification = new Notification;

		$notification->sender_id = Auth::user()->id;
		$notification->class_id = Session::get('sesClassId')->class_id;
		$notification->content = $input_data["content"];
		$notification->schedule = $input_data["bdaytime"];
		$notification->file = $link;
		$notification->save();

		return redirect("classes");
	}	
	// --- LH ---
	// 15-11-15
	// Thêm lớp 
	public function addClass()
	{

		// khai báo biến 
		$Public = false;
		$Reply = false;
		$Message = false;
		$Icon = '';
		$strClassName = Input::get('className');
		$strClassCode = Input::get('classCode');
		if (Input::has('icon-image'))
		{
			$Icon = Input::get('icon-image');
		}
		if (Input::has('participant_can_reply'))
		{
			$Reply = Input::get('participant_can_reply');	
		}
		if (Input::has('message_under_13'))
		{
			$Message = Input::get('message_under_13');	
		}
		$class = Classes::create(
            [
                'class_code' 	=> $strClassCode,
                'class_name'    => $strClassName,
                'icon'			=> $Icon,
                'is_public'		=> $Public,
            ]
        );


		// lấy lớp vừa tạo
		$classId = Classes::orderBy('id', 'desc')->first();

		// insert vào lớp class_users với giáo viên hiện tại tương ứng user_id
		$class_users = ClassUser::create(
			[
				'class_id'				=> $classId->id,
				'user_id'				=> Auth::user()->id,
				'is_owner'				=> true,
				'participant_can_reply' => $Reply,
				'message_under_13'		=> $Message,
			]);

		//classes::table('classes')->insertGetId($values);
		//return view('classes.home')
        //->with('demoView', $strClassName);
        return redirect('classes');
	}

	// --- LH ---
	// 15-11-15
	// Chỉnh sửa lớp
	public function updateClass($id)
	{
		if ($id == null)
		{
			$id = Session::get('sesClassId')->class_id;
		}
		$Public = false;
		$Reply = false;
		$Message = false;
		$Icon = '';
		$strClassName = Input::get('className');
		$strClassCode = Input::get('classCode');
		if (Input::has('icon-image'))
		{
			$Icon = Input::get('icon-image');
		}
		if (Input::has('participant_can_reply'))
		{
			$Reply = Input::get('participant_can_reply');	
		}
		if (Input::has('message_under_13'))
		{
			$Message = Input::get('message_under_13');	
		}
		if (Input::has('participant_be_public'))
		{
			$Public = Input::get('participant_be_public');	
		}
		//$notification->sender_id = Auth::user()->id;
		//$notification->class_id = $input_data["toClass"];
		//$notification->content = $input_data["content"];
		//$notification->file = "..\uploads\\".$link;
		//$notification->save();


		$class = Classes::find($id);
		$class->class_code = $strClassCode;
		$class->class_name = $strClassName;
		$class->is_public = $Public;
		$class->icon = $Icon;
		$class->save();

		//return view('classes.home')
        //->with('classes', $classes);

        return redirect('classes/' . $id);
	}

	public function show($id)
    {
    	// class 
    	$classes = ClassUser::where('user_id', Auth::user()->id)
    							->join('classes', 'classes.id', '=', 'class_users.class_id')->get();

    	$idn = Session::get('sesClassId')->class_id;
    	$notifications = Notification::where('sender_id', Auth::user()->id)
    									->orwhere('class_id', $idn)->orderBy('id','desc')->get();

    	//$PresentClass = 
    	if ($id != null)
    	{
    		// chọn lớp tương ứng id
    		$ClassId = ClassUser::where('class_id', Auth::user()->id)
    							->orwhere('class_id', $id)
    							->join('classes', 'classes.id', '=', 'class_users.class_id')
    							->join('users', 'users.id', '=', 'class_users.user_id')
    							->first();
    	}
    	else
    	{
    		// nếu không tìm được id thì gán mặc định là first 
    		$ClassId = ClassUser::where('user_id', Auth::user()->id)
    							->join('classes', 'classes.id', '=', 'class_users.class_id')
								->join('users', 'users.id', '=', 'class_users.user_id')
    							->first();
    	}

    	// gán session						
    	Session::put('sesClassId', $ClassId);
        return view('classes.home')
        ->with('classes', $classes)->with('notifications', $notifications);
    }


    public function joinClass()
    {
    	$strClassCode = Input::get('classCode');
    	$classes = Classes::where('class_code', $strClassCode)
    	->orwhere('is_public', true)
    	->first();
    	if(is_null($classes->id))
    	{
    		//Them vao lop class_users: class_id, user_id, is_owner
    		//Tim is_owner
    		return view('classes.home'); 
   		}
    	else
    	{
    			$class_users = ClassUser::create(
				[
					'class_id'				=> $classes->id,
					'user_id'				=> Auth::user()->id,
					'is_owner'				=> false,
					'participant_can_reply' => false,
					'message_under_13'		=> false,
				]);
   		}
            //return view('classes.home');
    		//return redirect('classes');
    		return redirect()->action('ClassesController@show', [$class_users->class_id]);
    	
    }


    public function addUser()
    {
    	$du_lieu_tu_input = $request->all();
        
    	User::create([
            'name' => $du_lieu_tu_input['firstname'],
            'email' => $du_lieu_tu_input['email'],
            'password' => bcrypt($du_lieu_tu_input['pass']),
        ]);
        return Redirect::to("join/role_picker"); 

    }

}

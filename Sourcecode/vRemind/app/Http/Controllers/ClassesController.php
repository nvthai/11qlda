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

		if (is_null($classes))
		{
			return view ('classes.nothing');
		}


    	if (Session::has('sesClassId'))
    	{
    		// nếu không tìm được id thì gán mặc định là first 
    		$ClassId = ClassUser::where('user_id', Auth::user()->id)
    							->orwhere('class_id', Session::get('sesClassId')->class_id)
    							->join('users', 'users.id', '=', 'class_users.user_id')
    							->join('classes', 'classes.id', '=', 'class_users.class_id')->first();
    		// gán session
			Session::put('sesClassId', $ClassId);	
    	}
    	else
    	{
			$ClassId = ClassUser::where('user_id', Auth::user()->id)
			//->orwhere('class_id', Session::get('sesClassId')->class_id)
								->join('users', 'users.id', '=', 'class_users.user_id')
								->join('classes', 'classes.id', '=', 'class_users.class_id')->first();
	    	// gán session
			if (is_null($ClassId))					
			{
				return view('classes.nothing');
			}
    	}								


    	Session::put('sesClassId', $ClassId);

    	$id = Session::get('sesClassId')->class_id;
    	
    	
        //return view('classes.home')
        //->with('classes', $classes);
        return redirect('classes/' . $id);
    }

    public function rolePicker()
    {
    	if(Session::has('userTraVe'))
    	{
    		return view('auth.rolepicker')->with("userIdTraVe",Session::get('userTraVe'));	
    	}else{
    		return redirect('/');	
    	}
        
    }

    public function saveRole(Request $request)
    {
    	$du_lieu_tu_input = $request->all();
    	$user = User::find($du_lieu_tu_input["iduser"]);
    	//$user = User::find(Auth::id());
    	$user->role = $du_lieu_tu_input["roleofuser"] ;

    	$user->save();
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
    	$pathToFile = '‪D:\github\11qlda\Documents\DacTaKiemThu.doc';
        //return response()->download($pathToFile);
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
    						->where('is_owner', true)	
							->join('classes', 'classes.id', '=', 'class_users.class_id')->get();

    	$idn = Session::get('sesClassId')->class_id;
    	
    	
    	
    	$notifications = Notification::where('sender_id', Auth::user()->id)
    									->orwhere('class_id', $idn)->orderBy('id','desc')->get();
    							

    	//$PresentClass = 
    	if ($id != null)
    	{
    		// chọn lớp tương ứng id

    		// thay đổi class_id thành user_id
    		$ClassId = ClassUser::where('class_id', $id)
    							->where('is_owner', true)	
    							->join('classes', 'classes.id', '=', 'class_users.class_id')
    							->join('users', 'users.id', '=', 'class_users.user_id')
    							->first();
    	}
    	else
    	{
    		// nếu không tìm được id thì gán mặc định là first 
    		$ClassId = ClassUser::where('user_id', Auth::user()->id)
    							->where('is_owner', true)	
    							->join('classes', 'classes.id', '=', 'class_users.class_id')
								->join('users', 'users.id', '=', 'class_users.user_id')
    							->first();

    		// Nếu không tìm được lớp					
			Session::put('sesClassId', $ClassId);
    	}

    	// gán session						
    	Session::put('sesClassId', $ClassId);



	$ClassId = Session::get('sesClassId')->class_id;

    	// Tìm tất cả người tham gia lớp
    	$Participants = ClassUser::where('class_id',  $ClassId)
    							->where('is_owner', false)->get();


    	// Remove người tham gia

    	//return redirect('classes/' . $ClassId);




        return view('classes.home')
        ->with('classes', $classes)
        ->with('notifications', $notifications)
        ->with('participants', $Participants);
    }


    public function joinClass()
    {
    	$strClassCode = Input::get('classCode');

    	$strclassId = Classes::where('class_code', $strClassCode)
    	->orwhere('is_public', true)
    	->value(id);
    	if(is_null($strclassId))
    	{
    		//Dua thong bao ra khong tim thay lop
    		return view('classes.home');
    	}
    	else
    	{
    		//Them vao lop class_users: class_id, user_id, is_owner
    		//Tim is_owner 
    			$class_users = ClassUser::create(
				[
					'class_id'				=> $strclassId,
					'user_id'				=> Auth::user()->id,
					'is_owner'				=> false,
					'participant_can_reply' => false,
					'message_under_13'		=> false,
				]);
    		
              //return view('classes.home');
    		//return redirect('classes');
    			  return redirect()->action('ClassesController@index');
    	}

    }
    public function themMotUserMoi(Request $request)
    {


    	$du_lieu_tu_input = $request->all();
    	$userNew = new User;
    	$userNew->name = $du_lieu_tu_input["name"];
    	$userNew->last_name = $du_lieu_tu_input["lasttname"];
    	$userNew->email = $du_lieu_tu_input["email"];
    	$userNew->password = bcrypt($du_lieu_tu_input["pass"]);
    	
		$userNew->save();
	

    	return view('auth.rolepicker')->with("idUser",$userNew->id);
    }
   
    public function opensetting()
    {
    	return view("classes.setting")->with("pageReturn","setting");

    	$du_lieu_tu_input = $request->all();
        
    	User::create([
            'name' => $du_lieu_tu_input['firstname'],
            'email' => $du_lieu_tu_input['email'],
            'password' => bcrypt($du_lieu_tu_input['pass']),
        ]);
        return Redirect::to("join/role_picker"); 
    }




    // --- 09-12-2015
    // --- LH ---
    // Xóa lớp và đuổi người tham gia

        // Xóa lớp hiện hành
	public function deleteClass()
    {

    	$class_id = Session::get('sesClassId')->class_id;

    	// Remove tất cả thành viên	
		$Participants = ClassUser::where('class_id',  $class_id)
								 ->get();

		if (is_null($Participants))
		{
			return view('class.home');
		}
		else
		{
			// Remove tất cả mọi người ra lớp
			$Participants = ClassUser::where('class_id',  $class_id)
								 ->delete();


			// Xóa lớp					 
			$classes = Classes::where('id', $class_id)->delete();				 

			// tìm lớp khác trên tài khoản					 
			$other_class = ClassUser::where('user_id', Auth::user()->id)
									->join('users', 'users.id', '=', 'class_users.user_id')
									->join('classes', 'classes.id', '=', 'class_users.class_id')->first();

									
	    	if (is_null($other_class))
	    	{
	    		// Không tìm thấy
	    		return view('classes.nothing');
	    	}
	    	else
	    	{
	    		// tìm thấy

	    		// gán lại session
	    		Session::put('sesClassId', $other_class);

	    		$id = Session::get('sesClassId')->class_id;        
        		return redirect('classes/' . $id);		
	    	}
    	}
    }


    ///
    /// Đuổi tất cả người tham dự ra khỏi lớp

    // 09-12-2015
    // --- LH ---
    public function removeParticipant()
    {
    	$ClassId = Session::get('sesClassId')->class_id;
    	// Tìm tất cả người tham gia lớp
    	$Participants = ClassUser::where('class_id',  $ClassId)
    							->where('is_owner', false)->get();


    	// Remove người tham gia
    	if (is_null($Participants))
    	{
    		return redirect('classes/' . $ClassId);	
    		
    	}
    	else
    	{
    		ClassUser::where('class_id',  $ClassId)
					 ->where('is_owner', false)->delete();
    		return redirect('classes/' . $ClassId);
    	}						

    }
}

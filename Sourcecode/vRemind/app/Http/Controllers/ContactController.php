<?php
namespace vRemind\Http\Controllers;
use Illuminate\Support\Facades\Request;
use vRemind\Http\Requests;
use vRemind\Http\Controllers\Controller;
use vRemind\Http\Controllers\ContactController;
use Mail;
class ContactController extends Controller {
    public function create()
    {
        return view('contact');
    }
    public function store(Request $request)
    {
        $data = ['home' => ''];

        Mail::send('emails.blanks',$data,function($msg){
            $msg -> from('vremind.11qlda@gmail.com','Contact Team vRemind');
            $msg -> to(request::input('email'))->subject ('From vRemind');
        });
        echo "<script>
        alert('Đã gửi lời mời!');
        window.location = '".url('/')."'
        </script> ";
    }
}
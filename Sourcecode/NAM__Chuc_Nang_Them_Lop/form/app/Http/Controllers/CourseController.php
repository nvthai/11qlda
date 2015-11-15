<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use DB;
use Collective\Html\HtmlServiceProvider;
use Collective\Html\FormFacade;
use App\Participation;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   
    public function index()
    {
        $participations = Participation::all();

        return view('index')->withParticipations($participations);
       /* $data = Course::all();
        return view('index')->with($data);*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'ClassId' => 'required',
        'TeacherId' => 'required',
        'PartnerId' => 'required'
        ]);

        $input  = $request->all();
        Participation::create($input);
        Session::flash('flash_message', 'Join courses successfully added!');
        return redirect('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $par = new Participation;


        //$par = App\Participation::create(array('ClassId' => '1' ,'TeacherId'=> '1','PartnerId' => 'aabb'));

        return view('show', compact('par'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function form_join()
    {
        return view('forn_join');
    }

    public function search(Request $request)
    {
        $query = $request->input('Code');

        $courses = DB::table('courses')->where('Code','LIKE', '%'. $query. '%')->paginate(10);
        
        return view('search', compact('courses', 'query'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

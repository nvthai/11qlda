<?php

namespace vRemind\Http\Controllers;

use Illuminate\Http\Request;
use vRemind\Http\Requests;
use vRemind\Http\Controllers\Controller;

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
}

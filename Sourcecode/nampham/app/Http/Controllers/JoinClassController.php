<?php

class JoinclassController extends BaseController
{
	public function home()
	{
		return View::make('home');
	}

	public function create()
	{
		return View::make('create');
	}

	public function edit()
	{
		return View::make('edit');
	}

	public function delete()
	{
		return View::make('delete');
	}
}
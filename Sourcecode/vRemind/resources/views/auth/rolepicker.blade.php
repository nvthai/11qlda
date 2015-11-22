@extends('layout.defaultLogin')
@section('titlePage')
	Select role
@endsection
@section('content')
	{!! "user role: " .Auth::user()->role !!}

	{!! Form::open(array('route' => 'role.selected')) !!}
		{!! Form::hidden('role', 'teacher') !!}
		{!! Form::submit('Teacher', array('class' => 'btn')) !!}
	{!! Form::close() !!}

	{!! Form::open(array('route'=> 'role.selected')) !!}
		{!! Form::hidden('role', 'parent') !!}
		{!! Form::submit('Parents', array('class' => 'btn')) !!}
	{!! Form::close() !!}
	
	{!! Form::open(array('route' => 'role.selected')) !!}
		{!! Form::hidden('role', 'student') !!}
		{!! Form::submit('Student', array('class' => 'btn')) !!}
	{!! Form::close() !!}
@endsection
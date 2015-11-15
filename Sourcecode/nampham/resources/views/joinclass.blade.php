@extends('layout')
@section('content')
	<h1>Join Class</h1>
	<p>Please enter id code</p>
	{!! HTML::ul($errors->all(), array('class'=>'errors')) !!}
	{!! Form::open(array('url' => 'joinclass')) !!}
	{!! Form::label('ID') !!}
	{!! Form::text('id', 'Enter id class') !!}
	<br/>
	{!! Form::submit() !!}
	{!! Form::close() !!}
@stop
 
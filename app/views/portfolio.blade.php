@extends('layouts.master')

@section('top-script')
	<title>My Portfolio</title>
@stop

@section('content')
	<h1>This is my Portfolio</h1>
	<a href="{{{ action('HomeController@showResume') }}}">Resume Page</a><br>
	<a href="{{{ action('HomeController@showForecast') }}}">Weather Application</a>


@stop
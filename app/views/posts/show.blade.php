
@extends('layouts.master')

@section('top-script')
	<title>Posts</title>
@stop

@section('content')
	<h1>Posts Page</h1>

		<h2>{{{ $post->title }}}</h2>
		<p>{{{ $post->body }}}</p>

		<span>Created At: {{{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A') }}} </span>

	<a href="{{{ action('PostsController@index') }}}">Return to Home</a>

@stop





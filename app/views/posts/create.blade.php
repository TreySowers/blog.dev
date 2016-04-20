@extends('layouts.master')

@section('top-script')
	<title>Post Create</title>
@stop

@section('content')
	<h1>Create New Post</h1>
	
	<!--<form method="POST" action="{{{ action('PostsController@store') }}}"> -->
	{{ Form::open(['action' => 'PostsController@store', 'method' => 'POST']) }}

		<div class="title">
			{{ Form::label('title', 'Title') }}
			{{ Form::text('title') }}
		</div>

		@if ($errors->has('title'))
			<p>{{ $errors->first('title', '<span style="color:red">:message</span>') }}</p>
		@endif

		<div class="content">
			{{ Form::label('body', 'Body') }}
			{{ Form::text('body') }}
			
		</div>

		@if ($errors->has('body'))
			<p>{{ $errors->first('body', '<span style="color:red">:message</span>') }}</p>
		@endif

		<div class="btn">
			{{ Form::submit('Save & Submit') }}
		</div>

	{{ Form::close() }}
@stop

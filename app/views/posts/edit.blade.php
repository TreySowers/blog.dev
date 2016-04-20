@extends('layouts.master')

@section('top-script')
	<title>Post Create</title>
@stop

@section('content')
	<h1>Create New Post</h1>
	
	<!--<form method="POST" action="{{{ action('PostsController@store') }}}"> -->
	{{ Form::model($post, ['action' => array('PostsController@update', $post->id), 'method' => 'PUT']) }}

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
			
			{{ Form::submit('Save & Submit') }}
		</div>

		@if ($errors->has('body'))
			<p>{{ $errors->first('body', '<span style="color:red">:message</span>') }}</p>
		@endif

	{{ Form::close() }}
@stop

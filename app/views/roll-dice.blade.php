@extends('layouts.master')

@section('top-script')
	<title>Roll Dice Game</title>
	
@stop

@section('content')
	<h1>Roll Dice Game</h1>
	<h3>Guess: {{{$guess}}}</h3>
  	<h3>Random:  {{{$random}}}</h3>

  	@if($random == $guess)
  		<h3>Correct</h3>
  	@else
  		<h3>Wrong</h3>
  	@endif

  	{{ '<p>This is a paragraph</p>' }}
@stop

@section('bottom-script')

@stop
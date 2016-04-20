<?php

class PostsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		 $posts = Post::paginate(4);

    	 return View::make('posts.index')->with('posts', $posts);
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('posts.create');
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(), Post::$rules);

		if ($validator->fails()) {
			return Redirect::back()->withInput()->withErrors($validator);
		} 
			$post = new Post();
			$post->title = Input::get('title');
			$post->body = Input::get('body');
			$post->save();
			Log::info('This is some useful information.', $post);

			return Redirect::action('PostsController@index');
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = Post::find($id);

		if(!$post) {
			return App::abort(404);
		}

		return View::make('posts.show')->with('post', $post);
		// return View::make('posts.show')->with(['post' => $post]);
			
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = Post::find($id);

		if(!$post) {
			return App::abort(404);
		}

		return View::make('posts.edit')->with('post', $post);
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$validator = Validator::make(Input::all(), Post::$rules);

		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$post = Post::find($id);
		if(!$post) {
			return App::abort(404);
		}
		$post->title = Input::get('title');
		$post->body = Input::get('body');
		$post->save();

		return Redirect::action('PostsController@show', $post->id);
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$post = Post::find($id);

		if(!$post) {
			Session::flash('errorMessage', "Post was not found");	
			return Redirect::action('PostsControlle@index');	
		}

		$post->delete();

		Session::flash('successMessage', "The post was successfully deleted");

		return Redirect::action('PostsController@index');
	}

	public function validateAndSave($post)
	{
		$validator = Validate::make(Input::all(), Post::$rules);

		if($validator->fails())
		{
			Session::flash('errorMessage', "Unable to save post.");
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$post = Post::find($id);
		$post->title = Input::get('title');
		$post->body = Input::get('body');
		$post->save();

		Session::flash('successMessage', "Post was successfully saved");

		return Redirect::action('PostsController@show', $post->id);
	}


}

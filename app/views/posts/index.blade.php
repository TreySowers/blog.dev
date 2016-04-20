@extends('layouts.master')

@section('top-script')
        <title>Blog Posts</title>
@stop

@section('content')

        <h1>This is the Posts page</h1>
        <table>
        @foreach($posts as $post)
        <tr>
                <td>
                <a href="{{{ action('PostsController@show', $post->id) }}}">{{{ $post->title }}}</a>
                </td>
        </tr>

        @endforeach

        </table>

        {{ $posts->links() }}
        <h2>First Post</h2>
        <p>

                <a href="{{{ action('PostsController@create') }}}">Create a new one</a>

        </p>

@stop
        

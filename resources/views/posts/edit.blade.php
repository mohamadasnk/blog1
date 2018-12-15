@extends('layout.app')






            @section('content')
{!!Form::open(['action'=>['PostController@update', $post->id], 'method'=>'PUT']) !!}
{{Form::label('title','Title')}}
{{Form::text('title' , $post->title, ['class'=>'', 'placeholder'=>''])}} <br>

{{Form::label('body','Body')}}
{{Form::textarea('body' , $post->body, ['class'=>'', 'placeholder'=>''])}} <br>
{{Form::submit('edit your post')}}


{!! Form::close() !!}

                @endsection
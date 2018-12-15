@extends('layout.app')





@section('content')

    <a href="{{action('PostController@index')}}"><img src="https://cdn1.iconfinder.com/data/icons/navigation-40/24/i24_nav_back-512.png" alt="" style="width: 30px;"></a>
    <br>
    <br>
    <br>


                {{$post->title}}
    <br>
    <br>
    {{$post->body}}
    <br>



    <small>{{$post->created_at}}</small>
    <br>
    <br>
    <br>



    <a href="{{action('PostController@edit',$post->id)}}"><img src="https://www.freeiconspng.com/uploads/edit-png-icon-blue-pencil-18.png" alt=""style="width: 35px;"></a>
    {!! Form::open(['action'=>['PostController@destroy', $post->id], 'method'=>'DELETE']) !!}
    {{Form::submit('delete',['class'=>'ali'])}}
    {!! Form::close() !!}



    @endsection
@extends('layout.app')





@section('content')

    <a href="{{action('PostController@index')}}"><img src="https://cdn1.iconfinder.com/data/icons/navigation-40/24/i24_nav_back-512.png" alt="" style="width: 30px;"></a>
    <br>
    <br>
    <br>


                {{$post->title}}
    <br>


    <img style="width: 500px" src="http://localhost/blog1/public/storage/images/{{$post->image}}" alt="">
    <br>

    <a href="http://localhost/blog1/public/posts/{{$post->id}}/like" >

    @if()







        <i class="fa fa-heart-o"></i>  </a>


    {{--action('LikeController@AddLike', $post->id)--}}


    <br>
    <br>
    {{$post->body}}
    <br>



    <small>{{$post->created_at}} by {{$post->user->name}}></small>
    <br>
    <br>
    <br>

@if(!Auth::guest())
@if(Auth::user()->id ==$post->user_id)

    <a href="{{action('PostController@edit',$post->id)}}"><img src="https://www.freeiconspng.com/uploads/edit-png-icon-blue-pencil-18.png" alt=""style="width: 35px;"></a>
    {!! Form::open(['action'=>['PostController@destroy', $post->id], 'method'=>'DELETE']) !!}
    {{Form::submit('delete',['class'=>'ali'])}}
    {!! Form::close() !!}
@endif
@endif
    @endsection
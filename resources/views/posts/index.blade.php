@extends('layout.app')



        @section('content')
                <h3>Every day, lots of posts is created here</h3>
                <a href="{{action('PostController@create')}}"><div class="table"> You can create Posts here</div></a>
        <ul>

                        @foreach($post as $data)
                        <div class="well">
                            <a href="{{action('PostController@show',$data->id)}}"> {{$data->title}} </a> <br>
                                {{$data->body}}

                               <small> <br> this post is written at {{$data->created_at}} by {{$data->user->name}}</small>
                                <br> <br>
                                <br> <br>
                        </div>

                                @endforeach
        </ul>
{{$post->links()}}
            @endsection
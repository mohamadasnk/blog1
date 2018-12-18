@extends('layout.app')



        @section('content')
            <br>
            {!! Form::open(['action'=>'PostController@store', 'method'=> 'POST', 'enctype'=>'multipart/form-data'])  !!}
            {{Form::label('title','Title')}}
            {{Form::text('title', '',['class'=>'', 'placeholder'=> 'Here is your title'])}}<br> <br>
            {{Form::label('body','Body')}}
            {{Form::textarea('body','',['class'=>'', 'placeholder'=>'Place your body in here'])}}<br>
            {{Form::file('image')}}<br>  <br>



            {{Form::submit('add your Post')}}
            {!! Form::close() !!}


            @endsection
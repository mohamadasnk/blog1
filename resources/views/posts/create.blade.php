@extends('layout.app')



        @section('content')
            {!! Form::open(['action'=>'PostController@store', 'method'=> 'POST'])  !!}
            {{Form::label('title','Title')}}
            {{Form::text('title', '',['class'=>'', 'placeholder'=> 'Here is your title'])}}
            {{Form::label('body','Body')}}
            {{Form::textarea('body','',['class'=>'', 'placeholder'=>'Place your body in here'])}}
            {{Form::submit('add your Post')}}
            {!! Form::close() !!}


            @endsection
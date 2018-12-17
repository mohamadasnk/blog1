@extends('layout.app')




@section('content')



  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Your Dashboard is here mr/ms {{Auth::user()->name}}</div>
                  <a href="{{action('PostController@create')}}" class="btn btn-primary"> Create Post </a>
                  <div class="card-body">
                      @if (session('status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                      @endif
@foreach($posts as $data)

    {{$data->title}}  <br>


    @endforeach



                  </div>
              </div>
          </div>
      </div>
  </div>





    @endsection
@extends('client.parts.setupblade')

@section('title', 'SPSEKE')

@section('content')
<div class="content">
    <div class="index_wrapper">
      <a href="{{ route('login.personal.index')}}" class="box">
        <h2>{{__('client.client.login')}}</h2>
        <img src="{{asset('media/icons/file.png')}}" alt="">
      </a>
      <a href="{{ route('testclient.tests.index')}}" class="box">
        <h2>{{__('client.client.tests')}}</h2>
        <img src="{{asset('media/icons/paper.png')}}" alt="">
      </a>
    </div>
  </div>
@endsection
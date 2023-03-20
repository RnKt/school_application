@extends('client.parts.setupblade')

@section('title', 'Osobné údaje')

@section('content')
  <div id="index_wrapper" class="index_wrapper">
   <div class="form_division">
      <img class="img_school" src="{{asset('media/icons/school.png')}}" alt="">
      <input type="hidden" id="division" name="division">    
      <label class= "choose choose-clicked" for="{{$division->id}}">{{$division->name}}</label>
    </div>
    <div class="form_applicant">
      <div class="form_applicant-header">
        <img src="" alt="">
        <h3>Stredna Priemyselna skola Elektrotechnicka</h3>
      </div>
      <div class="form_applicant-container">
        <h1>Tvoj kod: {{$your_code}}</h1>
      </div>
    </div>
  </div>
@endsection
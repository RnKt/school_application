@extends('client.parts.setupblade')

@section('title', 'Osobné údaje')

@section('content')
  <form action="{{ route('login.personal.store') }}" method="POST" id="index_wrapper" class="index_wrapper">
    @csrf  
    <div class="form_division">
      <img class="img_school" src="{{asset('media/icons/school.png')}}" alt="">
      <input type="hidden" id="division" name="division">
      @foreach($divisions as $division)        
        <input 
          type="radio"
          name="division"
          class= "radio"
          value="{{$division->id}}"
          id="{{$division->id}}"/>
          <label class= "choose" for="{{$division->id}}">{{$division->name}}</label>
      @endforeach
    </div>
    <div class="form_applicant">
      <div class="form_applicant-header">
        <img src="" alt="">
        <span>{{ __('app.context.school_name') }}</span>
      </div>
      <div class="form_applicant-inputs">
        <div class="input_box">
          <label for="first_name">First name</label>
          <input type="Text" name="first_name"/>
        </div>
        <div class="input_box">
          <label for="last_name">Last name</label>
          <input type="Text" name="last_name"/>
        </div>
        <div class="input_box">
          <label for="date_of_birth">Dátum narodenia</label>
          <input type="date" name="date_of_birth"/>
        </div>
        <div class="input_box">
          <label for="email">E-mail</label>
          <input type="Text" name="email"/>
        </div>
      </div>
      <div class="form_applicant-footer">
        <button class="personal_form-submit" type="submit">Ďalej</button>
        <a href="{{route('login.code.index')}}">Zistiť údaje</a>
      </div>
      <ul class="error_wrapper">       
        @if($errors->any()) 
            <li class="error_wrapper-error">{{$errors->first()}}</li>
        @endif
      </ul>
    </div> 
  </form>
  
@endsection

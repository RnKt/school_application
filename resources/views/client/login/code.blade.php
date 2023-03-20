@extends('client.parts.setupblade')

@section('title', 'osobné údaje')

@section('content')
  <form action="{{ route('login.code.store') }}" method="POST"  id="index_wrapper" class="index_wrapper">
   @csrf    
    <div class="form_division">
      <img class="img_school" src="{{asset('media/icons/school.png')}}" alt="">
    </div>
    <div class="form_applicant">
      <div class="form_applicant-header">
        <img src="" alt="">
        <h3>Stredna Priemyselna skola Elektrotechnicka</h3>
      </div>
      <div class="form_applicant-container">
        <h3>Zadaj svoj kod</h3>
        <div class="form_applicant-box">
          <input type="Text" name="code" id="code">
          <button class="personal_form-submit" type="submit">Hľadať</button>
        </div>
      </div>
      <div class="form_applicant-container-boxes">
        @isset($applicant)
          <div>
            Kod: {{$code}}
          </div>
          <div>
            Meno: {{ $applicant->first_name }} {{ $applicant->last_name }}
          </div>        
          <div>
            Body: {{ $applicant_points }}
          </div>
          <div>
           Status: {{ $applicant->status }}
          </div>
        @endisset
      </div>
    </div>
  </form>
@endsection
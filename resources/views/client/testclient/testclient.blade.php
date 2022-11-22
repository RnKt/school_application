@extends('client.parts.setupblade')

@section('title', 'osobné údaje')

@section('content')
  <form action="{{ route('login.code.store') }}" method="POST"  id="index_wrapper" class="index_wrapper">
   @csrf    
  <div class="form_division">
      <img src="" alt="">
      <button class= "form_division-button">Lyceum</button>
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
          <button class="personal_form-submit" type="submit">
            <img class="form_applicant-submit_img" type ="image" src="" alt="Submit">
          </button>
        </div>
      </div>
      @isset($applicant)
        <div>
          {{ $applicant->first_name }} {{ $applicant->last_name }}
        </div>
        <div>
          {{ $applicant->status }}
        </div>
        <div>
          {{ $applicant_points }}
        </div>
      @endisset
    </div>
  </form>
@endsection
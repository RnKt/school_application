@extends('client.parts.setupblade')

@section('title', 'osobné údaje')

@section('content')
    <form class="index_wrapper">
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
      <div class="form_applicant-input_box">
          <input type="Text" name="zadaj_kod">
          <img class="form_applicant-submit_img" type ="image" src="" alt="Submit">
        </div>
     </div>
    </div>
  </form>
@endsection
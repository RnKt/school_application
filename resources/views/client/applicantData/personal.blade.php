@extends('client.parts.setupblade')

@section('title', 'osobné údaje')

@section('content')
    <form class="index_wrapper">
    <div class="form_division">
      <img src="" alt="">
      <button class= "form_division-button">Lyceum</button>
      <button class= "form_division-button">PCI</button>
      <button class= "form_division-button">ELE</button>
    </div>
    <div class="form_applicant">
      <div class="form_applicant-header">
        <img src="" alt="">
        <h3>Stredna Priemyselna skola Elektrotechnicka</h3>
      </div>
      <div class="form_applicant-inputs">
        <div class="input_box">
          <label for="name">Meno</label>
          <input type="Text"name="Name">
        </div>
        <div class="input_box">
          <label for="name">Meno</label>
          <input type="Text"name="Name">
        </div>
        <div class="boinput_boxx">
          <label for="name">Meno</label>
          <input type="Text"name="Name">
        </div>
        <div class="input_box">
          <label for="name">Meno</label>
          <input type="Text"name="Name">
        </div>
      </div>
      <div>
        <button class="personal_form-submit">Submit</button>
        <a href="">Zistit udaje</a>
      </div>
    </div>
    </form>
@endsection
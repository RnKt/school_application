@extends('client.parts.setupblade')

@section('title', 'osobné údaje')

@section('content')
  <form action="{{ route('login.personal.store') }}" method="POST" id="index_wrapper" class="index_wrapper">
    @csrf  
    <div class="form_division">
      <!-- <img src="" alt="">
      <button class= "form_division-button">Lyceum</button>
      <button class= "form_division-button">PCI</button>
      <button class= "form_division-button">ELE</button> -->
    </div>
    <div class="form_applicant">
      <div class="form_applicant-header">
        <img src="" alt="">
        <h3>Stredna Priemyselna skola Elektrotechnicka</h3>
      </div>
      <div class="form_applicant-results">   
        <div class="input_box">
          <label for="first_name">znamka SJL</label>
          <select class="actions__select input input--empty "
                name="division"
                id="action__division"
                >
            <option value="">none</option>
            <option value="1" >1</option>
            <option value="1" >2</option>
            <option value="1" >3</option>
            <option value="1" >4</option>
            <option value="1" >5</option>
          </select>
        </div>
      </div>
      <div class="form_applicant-results">
        <div class="input_box">
          <label for="first_name">Monitor SJL</label>
          <input type="Text" name="first_name">
        </div>
      </div>
      <div class="form_applicant-footer">
        <button class="personal_form-submit" type="submit">Submit</button>
        <a href="">Zistit udaje</a>
      </div>
    </div>
  </form>
@endsection
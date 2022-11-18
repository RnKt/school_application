@extends('client.parts.setupblade')

@section('title', 'osobné údaje')

@section('content')
  <form action="{{ route('login.result.store') }}" method="POST" id="index_wrapper" class="index_wrapper">
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
        @foreach($subjectRequirements as $subjectRequirement)
        {{$subjectRequirement->subject_id}}
          <div class="input_box">
            <label for="first_name">{{ $subjectRequirement->name }}</label>
            <select class="actions__select input input--empty "
                  name="subject_{{ $subjectRequirement->subject_id }}"
                  id="subject_{{ $subjectRequirement->subject_id }}"
                  >
              <option value="">none</option>
              <option value="1" >1</option>
              <option value="2" >2</option>
              <option value="3" >3</option>
              <option value="4" >4</option>
              <option value="5" >5</option>
            </select>
          </div>
        @endforeach  
      </div>
      <div class="form_applicant-results">
        @foreach($testRequirements as $testRequirement)
          <div class="input_box">
            <label for="first_name">{{ $testRequirement->name }}</label>
            <input type="number" name="test_{{ $testRequirement->test_id }}">
          </div>
        @endforeach  
      </div>
      <div class="form_applicant-footer">
        <button class="personal_form-submit" type="submit">Submit</button>
        <a href="">Zistit udaje</a>
      </div>
    </div>
  </form>
@endsection
@extends('client.parts.setupblade')

@section('title', 'osobné údaje')

@section('content')
  <form action="{{ route('login.result.store') }}" method="POST" id="index_wrapper" class="index_wrapper">
    @csrf  
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
      <div class="form_applicant-results">   
        @foreach($subjectRequirements as $subjectRequirement)
          <div class="input_box">
            <label for="first_name">{{ $subjectRequirement->name }}</label>
            <select class="actions__select input input--empty"
                  name="subjects[]"
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
        @foreach($testRequirements as $testRequirement)
        <input type="hidden" name="test_id[]" vlaue="{{$testRequirement->id}}">
          <div class="input_box">
            <label for="first_name">{{ $testRequirement->name }}</label>
            <input type="number" name="tests[]">
          </div>
        @endforeach  
      </div>
      <div class="form_applicant-footer">
        <button class="personal_form-submit" type="submit">Ďalej</button>
        <a href="{{route('login.code.index')}}">Zistiť údaje</a>
      </div>
    </div>
  </form>
  <div class="error_wrapper">
        @if($errors->any())
          @foreach($errors->all() as $error)     
            <div class="error_wrapper-error">{{$error}}</div>
          @endforeach
        @endif
      </div>
@endsection
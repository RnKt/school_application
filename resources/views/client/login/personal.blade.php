@extends('client.parts.setupblade')

@section('title', 'osobné údaje')

@section('content')
  <form action="{{ route('login.personal.store') }}" method="POST" id="index_wrapper" class="index_wrapper">
    @csrf  
    <div class="form_division">
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
        <h3>{{ __('app.context.school_name') }}</h3>
      </div>
      <div class="form_applicant-inputs">
        <div class="input_box">
          <label for="first_name">first name</label>
          <input type="Text" name="first_name">
        </div>
        <div class="input_box">
          <label for="last_name">last name</label>
          <input type="Text" name="last_name">
        </div>
        <div class="input_box">
          <label for="date_of_birth">datum narodenia</label>
          <input type="date" name="date_of_birth">
        </div>
        <div class="input_box">
          <label for="email">email</label>
          <input type="Text" name="email">
        </div>
      </div>
      <div class="form_applicant-footer">
        <button class="personal_form-submit" type="submit">Submit</button>
        <a href="{{route('login.code.index')}}">Zistit udaje</a>
      </div>
    </div>
  </form>
@endsection

@section('scripts_body')
<script>

</script>
@endsection
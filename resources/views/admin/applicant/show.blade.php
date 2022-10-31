@extends('admin.parts.setupblade')

@section('title', 'Vytvorit')

@section('content')
  <div class="content content--split">
  <div class="heading-action mb-8">
      <h1 class="heading heading--2 d-inline-block">{{$applicant->first_name}} {{$applicant->last_name}}</h1>
      <a href="{{ route('admin.applicant.show', ['applicant' => $applicant->id, 'type' => 'edit']) }}"
         class="heading-action__button button button--small">{{ __('app.action.edit') }}</a>
    </div>
    <div class="applicant__wrapper">
      <h3 class="mb-4">{{$divisions->where('id', '=', $applicant->division_id)->pluck('name')->first()}}</h3>
      <div class="applicant__wrapper-box">
        <h4 class="mb-1 mr-1"  >{{ __('app.applicant.age') }}:</h4>
        <span name="age">{{$applicant->age}}</span>
      </div>
      <div class="applicant__wrapper-box"> 
        <h4 class="mb-1 mr-1"  >{{ __('app.applicant.school_year') }}:</h4>
        <span name="year">{{$applicant->school_year}}</span>
      </div>
      <div class="applicant__wrapper-box"> 
        <h4 class="mb-1 mr-1"  >{{ __('app.applicant.application_created') }}:</h4>
        <span name="created">{{$applicant->created_at}}</span>
      </div>
    </div>
  </div>
@endsection

@section('scripts_body')
  <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
  <script>

  </script>
@endsection

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
      <div class="wrapper__personal">
        <h3 class="mb-4">{{$divisions->where('id', '=', $applicant->division_id)->pluck('name')->first()}}</h3>
        <div class="wrapper__personal-box">
          <h4 class="mb-1 mr-1"  >{{ __('app.applicant.date_of_birth') }}:</h4>
          <span name="age">{{$applicant->date_of_birth}}</span>
        </div>
        <div class="wrapper__personal-box"> 
          <h4 class="mb-1 mr-1"  >{{ __('app.applicant.school_year') }}:</h4>
          <span name="year">{{$applicant->school_year}}</span>
        </div>
        <div class="wrapper__personal-box"> 
          <h4 class="mb-1 mr-12"  >{{ __('app.applicant.application_created') }}:</h4>
          <span name="created">{{$applicant->created_at}}</span>
        </div>
      </div>
      <div class="wrapper__foto">
      </div>
    </div>
    <div class="applicant__table">
      <div class="applicant__table-header">
        <h4>Predmet</h4>
        <h4>Znamka</h4>
        <h4>Body</h4>
      </div>  
      @foreach($applicant_grades as $grade)
        <div class="applicant__table-row">
          <span>{{ $grade->name }}</span>
          <span>{{ $grade->grade }}</span>
          <span>{{ $grade->points }}</span>
        </div>  
      @endforeach
      </div>
    <div class="applicant__table">
      <div class="applicant__table-header">
        <h4>Testy</h4>
        <h4>hodnotenie</h4>
        <h4>Body</h4>
      </div>
      @foreach($applicant_scores as $score)
        <div class="applicant__table-row">
          <span>{{ $score->name }}</span>
          <span>{{ $score->score }}</span>
          <span>{{ $score->points }}</span>
        </div>  
      @endforeach
      </div>
@endsection

@section('scripts_body')
  <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
  <script>

  </script>
@endsection

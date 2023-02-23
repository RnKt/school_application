@extends('admin.parts.setupblade')

@section('title', __('app.context.overview'))

@section('content')
  <div class="content">
    <div class="content__wrapper divsion__wrapper">
      @foreach ($divisions as $division)
        <div class="division__box">
          <div class="division__box-name">
            <div class="division__name">
              <img class="icon-m" src="{{ asset('media/icons/coding.png') }}" alt="division-icon">
              <a href="{{ route('admin.applicant.index', ['division' => $division->id]) }}"><h1>{{$division->name}}</h1></a>
              <div class="division__box-student_count">
                <h3>{{$division->student_count}}</h3>
                <img class="icon-m"  src="{{ asset('media/icons/group.png') }}" alt="person-icon">
              </div>
            </div>
            <a href="{{ route('admin.division.show', ['division' => $division->id]) }}"
          class="button button--small">{{ __('app.action.edit')}}</a>
          </div>
        </div>
      @endforeach
      <a href="{{ route('admin.division.create') }}" >
          <div class="division__box division__box-add">+</div>
        </a>
    </div>
  </div>
@endsection
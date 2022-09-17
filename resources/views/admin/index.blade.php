@extends('admin.parts.setupblade')

@section('title', 'Prehľad')

@section('content')
@include('admin.parts.sidemenu')
  <div class="content">
    <div class="content__wrapper divsion__wrapper">
      @foreach ($divisions as $division)
        <div class="division__box">
          <div class="division__box-name">
            <div class="division__name">
              <img class="icon-m" src="{{ asset('media/icons/coding.png') }}" alt="division-icon">
              <a href="{{ route('admin.division.show', ['division' => 1]) }}"><h1>{{$division->name}}</h1></a>
            </div>
            <a href="{{ route('admin.division.create') }}"
          class="button button--small">Upravit</a>
          </div>
          <div class="division__box-classes">
            <img class="icon-m"  src="{{ asset('media/icons/cap.png') }}" alt="classes-icon">
            <div>
              <div class="class">
                <h3>1.A</h3>
                <h3>29</h3>
                <img class="icon-m"  src="{{ asset('media/icons/group.png') }}" alt="person-icon">
              </div>
            </div>
          </div>
        </div>
      @endforeach
      <a href="{{ route('admin.division.create') }}" >
          <div class="division__box division__box-add">+</div>
        </a>
    </div>
  </div>
@endsection
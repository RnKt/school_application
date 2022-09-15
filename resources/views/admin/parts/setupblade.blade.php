@extends('admin.parts.main')
@extends('admin.parts.sidemenu')

@section('class_body')body has-sidemenu{{ '' }}@yield('class_body')@overwrite

@section('content')
  @include('admin.parts.sidemenu')
  @yield('content')
@overwrite

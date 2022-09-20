@extends('admin.parts.main')


@section('class_body')body has-sidemenu{{ '' }}@yield('class_body')@overwrite

@section('content')
  @include('admin.parts.header')
  @include('admin.parts.sidemenu')
  @yield('content')
@overwrite

@extends('client.parts.main')

@section('content')
  @include('admin.parts.sidemenu')
  @yield('content')
@overwrite

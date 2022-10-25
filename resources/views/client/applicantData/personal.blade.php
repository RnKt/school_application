@extends('client.parts.setupblade')

@section('title', 'osobné údaje')

@section('content')
  <div class="form_wrapper">
     <form>
      <h1>Zaregistruj sa</h1>
      <input type="text" placeholder="Name">
      <input type="text" placeholder="Surname">
      <input type="email" placeholder="Email">
      <input type="button" value="Zaregistrovat sa">
     </form>
  </div>
@endsection
@extends('client.parts.setupblade')

@section('title', 'osobné údaje')

@section('content')
  <form action="{{ route('login.code.store') }}" method="POST"  id="index_wrapper" class="filter_wrapper">
   @csrf    
    <h1>Testy</h1>
    <select name="test_categories" id="" onchange="this.form.submit()"
                   >
      @foreach($test_categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
      @endforeach
    </select>
  </form>
  <div class="tests_wrapper">
    @foreach($tests as $key => $test)
      <div class="tests_wrapper-pick">
          <a href="{{ route('testclient.tests.show', ['test' => $test->id])}}">{{$key += 1}}</a>
      </div>
    @endforeach
  </div>
@endsection
@extends('client.parts.setupblade')

@section('title', Testy)

@section('content')
  <form action="{{ route('testclient.tests.index')}}" method="GET" id="index_wrapper" class="test_header">
   @csrf    
    <h1>Testy</h1>
    <select name="test_categories" onchange="this.form.submit()">
      @foreach($test_categories as $category)
        @if(isset($_GET['test_categories']))
          @if($category->id == $_GET['test_categories'])
            <option value="{{$category->id}}" selected>{{$category->name}}</option>
          @endif
          @if($category->id != $_GET['test_categories'])
            <option value="{{$category->id}}" >{{$category->name}}</option>
          @endif
        @endif
        @if(!isset($_GET['test_categories']))
          <option value="{{$category->id}}" >{{$category->name}}</option>
        @endif
      @endforeach
    </select>
  </form> 
  <div class="tests_wrapper">
    @if(isset($_GET['test_categories']))
      @foreach($tests->where('exam_category', '=', $_GET['test_categories'])->pluck('id') as $key => $test)
        <div class="tests_wrapper-pick">
            <a href="{{ route('testclient.tests.show', ['test' => $test])}}">{{$key += 1}}</a>
        </div>
      @endforeach
    @endif
    @if(!isset($_GET['test_categories']))
      @foreach($tests as $key => $test)
        <div class="tests_wrapper-pick">
            <a href="{{ route('testclient.tests.show', ['test' => $test])}}">{{$key += 1}}</a>
        </div>
      @endforeach
    @endif
  </div>
@endsection
@extends('client.parts.setupblade')

@section('title', $exam->name)

@section('content')
<div class="test_header">
  <h1>{{$exam->name}}</h1>
</div>
<form class="test_wrap" action="{{ route('testclient.tests.correct') }}" method="POST">
  @csrf
  @foreach($questions as $key => $question)
  <?php $a = -1 ?>
    <h2 class="question">
      <input type="hidden" name="exam" value="{{$exam->id}}">
      <input type="hidden" name="question" value="{{$question->id}}">
      <span>{{$key + 1}}. {{$question->question}}?</span>
    </h2>
    @foreach($answers as $answer)
      @if($answer->question_id == $question->id)
        <?php 
          $a++;
          $alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
        ?>
        <div class="answer_wrapper" onClick="check({{$answer->id}})">
          <div class="answer">{{$alphabet[$a]}}. {{$answer->answer}}</div>
          <input type="checkbox" id="{{$answer->id}}"  name="answers[]" value="{{ $answer->id }}"/> 
        </div>
      @endif         
    @endforeach
  @endforeach
  <button type="submit">Skontrolovat</button>
</form>
@endsection

@section('scripts_body')
<script>
  function check(id){
    document.getElementById(id).checked = !document.getElementById(id).checked;
  }
</script>
@endsection
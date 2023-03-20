@extends('client.parts.setupblade')

@section('title', $exam->name)

@section('content')
<div class="test_header">
  <h1>{{$exam->name}}</h1>
</div>
<div>
  @csrf
  @foreach($questions as $key => $question)
  <?php $a = -1 ?>
    <h2 class="question_correct">
      <input type="hidden" name="exam" value="{{$exam->id}}">
      <input type="hidden" name="question" value="{{$question->id}}">
      <span>{{$key + 1}}. {{$question->question}}?</span>
    </h2>
    <div class="test_wrap">
      @foreach($answers as $answer)
        @if($answer->question_id == $question->id)
          <?php 
            $a++;
            $alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
          ?>
          <div class="answer_wrapper">
          <div
            style="
                @if($answer->isTrue)
                      color: orange;        
                @endif
                @if(!$answer->isTrue && isset($my_answers))
                  @foreach($my_answers as $my_answer)
                    @if($my_answer == $answer->id) 
                        color: red;                 
                    @endif    
                  @endforeach 
                @endif
              "
          class="answer">{{$alphabet[$a]}}. {{$answer->answer}}</div></div>
        @endif         
      @endforeach
    </div>
  @endforeach
</div>
@endsection



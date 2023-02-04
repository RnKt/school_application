@extends('client.parts.setupblade')

@section('title', 'Vytvorit')

@section('content')
  <div class="content">
    <h1>{{$exam->name}}</h1>
    <form action="{{ route('admin.question.delete') }}" id="delete_form" method="POST">
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
            class="answer">{{$alphabet[$a]}}. {{$answer->answer}}</div>
          @endif         
        @endforeach
      @endforeach
    </form>
  </div>
@endsection



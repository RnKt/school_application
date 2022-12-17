@extends('admin.parts.setupblade')

@section('title', 'Vytvorit')

@section('content')
  <div class="content">
      <h1>{{ __('app.exam.question.add') }}</h1>
        <form action="{{ route('admin.exam.update', ['exam' => $exam->id]) }}" id="main_form" method="POST">
          @csrf
          @method('PUT')
            @foreach($questions as $key => $question)
            <?php $a = -1 ?>
              <h2 class="question">{{$key + 1}}. {{$question->question}}?</h2>
              @foreach($answers as $answer)
                @if($answer->question_id == $question->id)
                  <?php 
                    $a++;
                    $alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
                  ?>
                  <div
                    style="
                        @if($answer->isTrue)
                          color: green;
                        @endif
                      "
                   class="answer">{{$alphabet[$a]}}. {{$answer->answer}}</div>
                @endif         
              @endforeach
            @endforeach
            <label class="label label--required mb-2" for="name"><span
                class="label__text">pridat otazku</span>
              <input class="input" type="text"
                    name="question" id="name"
                    placeholder="otazka">
            </label>
            <div id="answers"></div>
            <button type="button" onClick="addAnswer()">pridat odpoved</button>
            <button class="button" type="submit">{{ __('app.action.save') }}</button>
        </form>
  </div>
@endsection

@section('scripts_body')
  <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
  <script>
    let count_answers = 0
    let current_answers = []
    var alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"
    const addAnswer = () => {
      const parent = document.getElementById('answers')
      const label = document.createElement('label')
      const input = document.createElement('input')
      const span = document.createElement('span')
      const iscorrect = document.createElement('input')
      const hidden = document.createElement('input')
      const delete_button = document.createElement('span')

      label.classList.add("label")
      label.classList.add("label--required")
      label.classList.add("mb-2")

      span.innerHTML = count_answers + "odpoved"
      span.id = count_answers
      current_answers.push(span.id)
      span.classList.add("label__text")

      input.placeholder = "odpoved"
      input.type = "text"
      input.name = "answers[]"

      iscorrect.type = "checkbox"
      iscorrect.addEventListener("click", () => {
         hidden.value = 1
        });

      hidden.value = 0
      hidden.type = 'hidden'
      hidden.name = "iscorrect[]"
     

      delete_button.innerHTML = "X"
      delete_button.classList.add("delete_answer")
      delete_button.addEventListener("click", () => { 
        label.parentNode.removeChild(label)
        current_answers = current_answers.filter((e) => { return e !== span.id })
        for(let i = 0; i < current_answers.length; i++){
          document.getElementById(current_answers[i]).innerHTML = alphabet[i]
        }
      })
 
      label.appendChild(span)
      label.appendChild(input)
      label.appendChild(iscorrect)
      label.appendChild(hidden)
      label.appendChild(delete_button)
      parent.appendChild(label)
      
      count_answers++    

      for(let i = 0; i < current_answers.length; i++){
        document.getElementById(current_answers[i]).innerHTML = alphabet[i]
      }
    }
  </script>
@endsection

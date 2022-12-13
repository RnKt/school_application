@extends('admin.parts.setupblade')

@section('title', 'Vytvorit')

@section('content')
  <div class="content">
      <h1>{{ __('app.exam.question.add') }}</h1>
        <form action="{{ route('admin.exam.update', ['exam' => $exam->id]) }}" id="main_form" method="POST">
          @csrf
          @method('PUT')
            @foreach($questions as $question)
              <div>{{$question->question}}</div>
              @foreach($answers as $answer)
                @if($answer->question_id == $question->id)
                  <div>{{$answer->answer}}</div>
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
    const addAnswer = () => {
      console.log('click')
      const parent = document.getElementById('answers')
      const label = document.createElement('label')
      const input = document.createElement('input')
      const span = document.createElement('span')

      label.classList.add("label")
      label.classList.add("label--required")
      label.classList.add("mb-2")

      span.innerHTML = count_answers + "odpoved"
      span.classList.add("label__text")

      input.placeholder = "odpoved"
      input.type = "text"
      input.name = "answers[]"

      label.appendChild(span)
      label.appendChild(input)
      parent.appendChild(label)
      
      count_answers++    
    }
  </script>
@endsection

@extends('admin.parts.setupblade')

@section('title', 'Vytvorit')

@section('content')
  <div class="content content--split">
    <div class="heading-action mb-8">
      <h1 class="heading heading--2 d-inline-block">{{ __('app.subject.edit') }}</h1>
    </div>
    <div class="content__wrapper">
      <form action="{{ route('admin.subject.update', ['subject' => $subject->id]) }}" id="main_form" method="POST">
        @csrf
        @method('PUT')
          <label class="label label--required mb-2" for="name"><span
              class="label__text">{{ __('app.manage.name') }}</span>
            <input class="input" type="text"
                  name="name" id="name"
                  placeholder="{{$subject->name}}"
                  value="{{$subject->name}}">
          </label>
          <button class="button" type="submit">{{ __('app.action.save') }}</button>
        </form>
    </div>
  </div>
@endsection

@section('scripts_body')
  <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
  <script>
    document.querySelector('#main_form').addEventListener('submit', function (e) {
      const data = document.querySelector('#editor').children[0].innerHTML
      document.querySelector('#content__input').setAttribute('value', data)
    })

    if(document.getElementById('hidden__visibility__input').value == 1){
      document.getElementById('visibility__input').checked = true;
    }
  </script>
@endsection

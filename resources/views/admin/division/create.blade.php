@extends('admin.parts.setupblade')

@section('title', __('app.division.create'))

@section('content')
  <div class="content">
    <div>
      <h1>{{ __('app.division.create') }}</h1>
        <ul class="error_wrapper">       
          @if($errors->any()) 
              <li class="error_wrapper-error">{{$errors->first()}}</li>
          @endif
        </ul>
        <form action="{{ route('admin.division.store') }}" id="main_form" method="POST">
          @csrf
            <label class="label label--required mb-2" for="name"><span
                class="label__text">{{ __('app.manage.name') }}</span>
              <input class="input" type="text"
                    name="name" id="name"
                    placeholder="{{ __('app.manage.name') }}">
            </label>

            <label class="label label--grid mb-4" for="student_count"><span
                class="label__text">{{ __('app.division.student_count') }}</span>
              <input class="input input--small" type="number"
                    name="student_count" id="student_count"
                    placeholder="{{ __('app.division.student_count') }}">
            </label> 
            <div class="popup" if="popup">
              <div id="selected_hidden" ></div>
              <div class="popup__selected" id="selected-subject" ></div>
              <div class="popup__items">
                <input type="hidden" name="subject_hidden" id="subject_hidden">
                @foreach ($subjects as $subject)  
                  <div class="popup__items-part" onClick="addSubject({{$subject->id}}, 'subject')">
                    <input id="subject{{$subject->id}}" value="{{$subject->name}}" type="checkbox"/>{{$subject->name}}
                  </div>
                @endforeach
              </div>
            </div>
            <div class="popup" if="popup">
              <div id="selected_hidden" ></div>
              <div class="popup__selected" id="selected-test" ></div>
              <div class="popup__items">
              <input type="hidden" name="test_hidden" id="test_hidden">
                @foreach ($tests as $test)  
                  <div class="popup__items-part" onClick="addSubject({{$test->id}}, 'test')">
                    <input id="test{{$test->id}}" value="{{$test->name}}" type="checkbox"/>{{$test->name}}
                  </div>
                @endforeach
              </div>
            </div>
            <button class="button" type="submit">{{ __('app.action.save') }}</button>
        </form>
    </div>
  </div>
@endsection

@section('scripts_body')
  <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
  <script>

    function clearSession(){
      if(sessionStorage.getItem('subject')){
        sessionStorage.setItem('subject', '')
      }
      if(sessionStorage.getItem('test')){
        sessionStorage.setItem('test', '')
      }
      console.log("aa")
    }
    clearSession()
    function addSubject(id, session){
      var item = document.getElementById(session + id)
      item.checked =  !item.checked

      var selectedDiv =  document.getElementById('selected-' + session)  
      var sessionItems = sessionStorage.getItem(session)
        
      if(sessionStorage.getItem(session)){
         sessionItems = JSON.parse(sessionItems)
      }

      if(Array.isArray(sessionItems)){
        console.log("add")
        if(!sessionItems.includes(id)){
          console.log("add")
          sessionItems.push(id)
          sessionStorage.setItem(session, JSON.stringify(sessionItems))
        }
        else if(sessionItems.includes(id) && item.checked == false){
          console.log("delete")
          sessionItems = sessionItems.filter(item => item !== id)
          sessionStorage.setItem(session, JSON.stringify(sessionItems))
        }
        
      }
      else{
        console.log("else")
        var array = [id]
        sessionStorage.setItem(session, JSON.stringify(array));  
      } 

      selectedDiv.innerHTML = ""
      JSON.parse(sessionStorage.getItem(session)).map(id => {
        var itemWrapper = document.createElement('div')
        var closeSpan = document.createElement('span')
        var getInput = document.getElementById(session + id).value

        itemWrapper.classList.add('popup__selected-part')    

        itemWrapper.append(getInput)
        selectedDiv.append(itemWrapper)
      })
      
      document.getElementById(session + '_hidden').value = JSON.parse(sessionStorage.getItem(session))

      console.log(document.getElementById(session + '_hidden').value)
    }

    var quill = new Quill('#editor', {
      theme: 'snow'
    });


    document.querySelector('#main_form').addEventListener('submit', function (e) {
      const data = document.querySelector('#editor').children[0].innerHTML
      document.querySelector('#content__input').setAttribute('value', data)
    })
  </script>
@endsection

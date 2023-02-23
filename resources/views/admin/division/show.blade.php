@extends('admin.parts.setupblade')

@section('title', 'Vytvorit')

@section('content')
  <div class="content content--split">
    <div class="heading-action mb-8">
      <h1 class="heading heading--2 d-inline-block">{{ __('app.division.edit') }}</h1>
    </div>
    <div class="content__wrapper">
      <form action="{{ route('admin.division.update', ['division' => $division->id]) }}" id="main_form" method="POST">
        @csrf
        @method('PUT')
            <label class="label label--required mb-2" for="name"><span
                class="label__text">{{ __('app.manage.name') }}</span>
              <input class="input" type="text"
                    name="name" id="name"
                    placeholder="{{$division->name}}"
                    value="{{$division->name}}">
            </label>
            <label class="label label--grid mb-4" for="student_count"><span
                class="label__text">{{ __('app.division.student_count') }}</span>
              <input class="input input--small" type="number"
                    name="student_count" id="student_count"
                    placeholder="{{$division->student_count}}"
                    value="{{$division->student_count}}">
            </label> 
            <div class="popup" if="popup">
              <div id="selected_hidden" ></div>
              <div class="popup__selected" id="selected-subject" ></div>
              <div class="popup__items">
                <input type="hidden" name="subject_hidden" id="subject_hidden" 
                  value="{{$required_subjects}}">
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
              <input type="hidden" name="test_hidden" 
              id="test_hidden" value="{{$required_tests}}">
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

    
function fillSession(){
      var required_subjects = document.getElementById('subject_hidden').value
      var required_tests = document.getElementById('test_hidden').value

      console.log(required_subjects)

      required_subjects = required_subjects.split(",")
      required_subjects.map(id => {
        addSubject(parseInt(id), 'subject')
      })

      required_tests = required_tests.split(",")
      required_tests.map(id => {
        addSubject(parseInt(id), 'test')
      })
    }
    fillSession()
    function addSubject(id, session){
      var item = document.getElementById(session + id)      
      item.checked =  !item.checked

      var selectedDiv =  document.getElementById('selected-' + session)  
      var sessionItems = sessionStorage.getItem(session)
        
      if(sessionStorage.getItem(session)){
         sessionItems = JSON.parse(sessionItems)
      }

      if(Array.isArray(sessionItems)){
        if(!sessionItems.includes(id)){
          sessionItems.push(id)
          sessionStorage.setItem(session, JSON.stringify(sessionItems))
        }
        else if(sessionItems.includes(id) && item.checked == false){
          sessionItems = sessionItems.filter(item => item !== id)
          sessionStorage.setItem(session, JSON.stringify(sessionItems))
        }
        
      }
      else{
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

    new Modules.Datatable('#datatable_1')

    function handleTabChange(table_id, tab_id) {
      $(`#${table_id} .datatable__menu-item[data-toggle!=${tab_id}]`).removeClass('datatable__menu-item--active')
      $(`#${table_id} .datatable__menu-item[data-toggle=${tab_id}]`).addClass('datatable__menu-item--active')
      $(`#${table_id} .datatable__tab[data-id!=${tab_id}]`).removeClass('datatable__tab--active')
      $(`#${table_id} .datatable__tab[data-id=${tab_id}]`).addClass('datatable__tab--active')
    }

    document.querySelector('#main_form').addEventListener('submit', function (e) {
      const data = document.querySelector('#editor').children[0].innerHTML
      document.querySelector('#content__input').setAttribute('value', data)
    })

    if(document.getElementById('hidden__visibility__input').value == 1){
      document.getElementById('visibility__input').checked = true;
    }
  </script>
@endsection

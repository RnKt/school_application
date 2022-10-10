@extends('admin.parts.setupblade')

@section('title', 'Vytvorit')




@section('content')
  <div class="content">
    <div>
      <h1>{{ __('app.division.create') }}</h1>
        <form action="{{ route('admin.division.store') }}" id="main_form" method="POST">
          @csrf
            <label class="label label--required mb-2" for="name"><span
                class="label__text">{{ __('app.manage.name') }}</span>
              <input class="input" type="text"
                    name="name" id="name"
                    placeholder="{{ __('app.manage.name') }}">
            </label>
            <label class="label label--grid mb-4" for="slug"><span
                class="label__text">{{ __('app.manage.slug') }}</span>
              <input class="input input--small" type="text"
                    name="slug" id="slug"
                    placeholder="{{ __('app.manage.slug') }}">
            </label>

            <label class="label label--grid mb-4" for="student_count"><span
                class="label__text">{{ __('app.manage.student_count') }}</span>
              <input class="input input--small" type="number"
                    name="student_count" id="student_count"
                    placeholder="{{ __('app.manage.student_count') }}">
            </label> 
            <label class="label label--grid mb-4" for="subjects"><span
                class="label__text">{{ __('app.manage.slug') }}</span>
              <input class="input input--small" type="number"
                    name="subjects" id="subjects"
                    placeholder="{{ __('app.manage.subjects') }}">
            </label> 
            <div class="popup" if="popup">
              <div id="selected_hidden" ></div>
              <div class="popup__selected" id="selected-subject" ></div>
              <div class="popup__items">
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
  </script>
@endsection

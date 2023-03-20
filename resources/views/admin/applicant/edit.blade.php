@extends('admin.parts.setupblade')

@section('title', __('app.applicant.edit'))

@section('content')
  <div class="content content--split">
    <div class="heading-action mb-8">
      <h1 class="heading heading--2 d-inline-block">{{ __('app.applicant.edit') }}</h1>
    </div>
    <div class="content__wrapper">
      <form action="{{ route('admin.applicant.update', ['applicant' => $applicant->id]) }}" id="main_form" method="POST">
        @csrf
        @method('PUT')
            <label class="label label--required mb-2" for="name"><span
                class="label__text">{{ __('app.manage.name') }}</span>
              <input class="input" type="text"
                    name="name" id="name"
                    placeholder="{{$applicant->name}}"
                    value="{{$applicant->name}}">
            </label>
            <label class="label label--grid mb-4" for="slug"><span
                class="label__text">{{ __('app.manage.slug') }}</span>
              <input class="input input--small" type="text"
                    name="slug" id="slug"
                    placeholder="{{$applicant->slug}}"
                    value="{{$applicant->slug}}">
            </label>

            <label class="label label--grid mb-4" for="student_count"><span
                class="label__text">{{ __('app.applicant.student_count') }}</span>
              <input class="input input--small" type="text"
                    name="student_count" id="student_count"
                    placeholder="{{$applicant->email}}"
                    value="{{$applicant->email}}">
            </label> 
            
            <button class="button" type="submit">{{ __('app.action.save') }}</button>
        </form>
    </div>
  </div>
@endsection

@section('scripts_body')
  <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
  <script>
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

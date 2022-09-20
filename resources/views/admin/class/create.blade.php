@extends('admin.parts.setupblade')

@section('title', 'Vytvorit')

@section('content')
  <div class="content">
    <div>
      <h1>{{ __('app.subject.create') }}</h1>
        <form action="{{ route('admin.subject.store') }}" id="main_form" method="POST">
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
  </script>
@endsection

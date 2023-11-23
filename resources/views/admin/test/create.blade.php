@extends('admin.parts.setupblade')

@section('title', __('app.test.create'))

@section('content')
  <div class="content">
    <div>
      <h1 class="mb-4">{{ __('app.test.create') }}</h1>
        <form action="{{ route('admin.test.store') }}" id="main_form" method="POST">
          @csrf
            <label class="label label--required mb-4" for="name"><span
                class="label__text">{{ __('app.manage.name') }}</span>
              <input class="input" type="text"
                    name="name" id="name"
                    placeholder="{{ __('app.manage.name') }}">
            </label>
            <button class="button" type="submit">{{ __('app.action.save') }}</button>
        </form>
    </div>
  </div>
@endsection


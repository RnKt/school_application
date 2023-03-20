@extends('admin.parts.setupblade')

@section('title', __('app.exam.create'))

@section('content')
  <div class="content">
      <h1>{{ __('app.exam.create') }}</h1>
        <form action="{{ route('admin.exam.store') }}" id="main_form" method="POST">
          @csrf
            <label class="label label--required mb-2" for="name"><span
                class="label__text">{{ __('app.manage.name') }}</span>
              <input class="input" type="text"
                    name="name" id="name"
                    placeholder="{{ __('app.manage.name') }}">
            </label>
            <div class="w-20 mr-3 wrapper">
            <label class="mb-4"  for="exam_category">{{ __('app.exam.title.one') }}:</label>
            <select class="actions__select input input--empty "
                    name="exam_category"
                    id="exam_category"
                    >
                    <option value="all">{{ __('app.action.all') }}</option>
              @foreach($exam_categories as $exam_category)
              <option value="{{$exam_category->id}}">{{$exam_category->name}}</option>
              @endforeach
            </select>
          </div>

            <button class="button" type="submit">{{ __('app.action.save') }}</button>
        </form>
  </div>
@endsection


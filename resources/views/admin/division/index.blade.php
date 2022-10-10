@extends('admin.parts.setupblade')

@section('title', __('app.pages.class.title'))


@section('content')
  <div class="content">
    <div class="heading-action mb-1">
      <h1 class="heading heading--2 d-inline-block">{{ __('app.division.title.many') }}</h1>
      <a href="{{ route('admin.division.create') }}"
         class="heading-action__button button button--small">{{ __('app.division.create') }}</a>
    </div>
    <div class="content__wrapper">
      <form action="{{ route('admin.division.action') }}" method="POST" id="main_form">
        @csrf
        <div class="actions mb-4">
          <div class="w-20 mr-1">
            <select class="actions__select input input--empty "
                    name="action"
                    id="action__input">
              <option value="delete">{{ __('app.action.all') }}</option>
              <option value="delete">{{ __('app.action.todecide') }}</option>
              <option value="">{{ __('app.action.accepted') }}</option>
              <option value="delete">{{ __('app.action.notaccepted') }}</option>
            </select>
          </div>
          <button class="button button--primary" type="submit"
                  data-action="open-popup">{{ __('app.action.perform') }}</button>
          @error('action')
          {{ $message }}
          @enderror
        </div>
        <table class="table mb-8">
          <thead class="table__head">
          <tr class="table__row table__row--head">
            <th class="table__cell table__cell--head align-center w-4"></th>
            <th class="table__cell table__cell--head">
              <div
                class="table__cell-content table__cell-content--head">{{ __('app.manage.name') }}</div>
            </th>
            <th class="table__cell table__cell--head">
              <div
                class="table__cell-content table__cell-content--head">{{ __('app.manage.classes') }}</div>
            </th>
            <th class="table__cell table__cell--head w-40 align-right">
              <div
                class="table__cell-content table__cell-content--head">{{ __('app.manage.created_at') }}</div>
            </th>
          </tr>
          </thead>
          <tbody class="table__body">
          @foreach($divisions as $division)
            <tr class="table__row" data-id="{{ $division->id }}">
              <td class="table__cell">
                <div class="table__cell-content align-center">
                  <div class="checkbox-wrapper mx-center">
                    <input type="checkbox" class="checkbox pseudo" name="divisions[]" value="{{ $division->id }}"/>
                    <div class="checkbox__body">
                      <svg class="checkbox__icon icon icon--white" viewBox="0 0 448 512">
                        <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                        <path
                          d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z"/>
                      </svg>
                    </div>
                  </div>
                </div>
              </td>
              <td class="table__cell">
                <a href="{{ route('admin.division.show', ['division' => $division->id]) }}"
                   class="table__cell-content hover hover--underline">
                  {{ $division->name }}
                </a>
              </td>
              <td class="table__cell align-right">
                <div class="table__cell-content">
                  kjbd
                </div>
              </td>
              <td class="table__cell align-right">
                <div class="table__cell-content">
                  {{ $division->created_at->format('d.m.Y') }}
                </div>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </form>
      @include('admin.parts.pagination', ['currentUrl' => 'admin.division.index'])
    </div>  
  </div>
@endsection

@section('scripts_body')
  <script>
    window._state_ = {}
  </script>
  <script>
    $(document).on('click', '[data-action="submit-form"]', function () {
      $('#main_form').submit()
      $('#overlay').addClass('hidden')
    })

    $(document).on('change', '[data-action="auto-change-order"]', function () {
      const url = new URL(window.location)
      url.searchParams.set('order_by', $('[name="order_by"]').find(":selected").val())
      window.location = url
    })

    $(document).on('click', '[data-action="change-search"]', function () {
      const url = new URL(window.location)
      url.searchParams.set('search', $('[name="search"]').val())
      url.searchParams.delete('page')
      window.location = url
    })
  </script>
@endsection
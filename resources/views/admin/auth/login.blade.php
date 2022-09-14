@extends('dashboard.template.without_header')

@section('title', format_title(__('seo.title.auth.login')))

@section('content')
  <div class="content">
    <div class="content__wrapper">
      <div class="login">
        <div class="login__wrapper">
          <form class="form" action="{{ route("admin.login") }}" method="POST">
            @csrf
            <h1 class="login__header heading heading--2 mb-2">{{ __('app.title.auth.login') }}</h1>
            <span
              class="login__subheader mb-8">{!! __('app.context.auth.login_subheader', ['name' => config('settings.app_name')]) !!}</span>
            <label class="label label--required mb-4" for="email"><span
                class="label__text">{{ __('form.field.auth.email') }}</span>
              <input class="input input--secondary" type="email"
                     name="email"
                     placeholder="{{ __('form.field.auth.email') }}">
            </label>
            @error('email')
            <span>{{ $message }}</span>
            @enderror
            <label class="label label--required mb-8" for="password"><span
                class="label__text">{{ __('form.field.auth.password') }}</span>
              <input class="input input--secondary" type="password"
                     name="password"
                     placeholder="{{ __('form.field.auth.password') }}">
            </label>
            @error('password')
            <span>{{ $message }}</span>
            @enderror
            <div class="split split--space-between split--fluid split--y-center">
              <div class="login__remember">
                <label class="login__remember-label" for="remember">
                  <div class="checkbox-wrapper mr-3">
                    <input type="checkbox" class="checkbox pseudo" name="remember"
                           id="remember"/>
                    <div class="checkbox__body">
                      <svg class="checkbox__icon icon icon--white" viewBox="0 0 448 512">
                        <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                        <path
                          d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z"/>
                      </svg>
                    </div>
                  </div>
                  {{ __('form.field.auth.remember') }}
                </label>
              </div>
              <button class="button" type="submit">{{ __('form.action.login') }}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

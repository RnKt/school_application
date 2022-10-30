<aside class="menu no-print">
  <div class="menu__wrapper">
    <a href="/" class="menu__logo-link">
      <img class="menu__logo-img" src="{{ asset('media/icons/open-book.png') }}" alt="">
    </a>
    <ul class="menu__items">
      <li class="menu__group mb-4">
        <ul>
          <li class="menu__item{{ request()->is('admin') ? ' menu__item--active' : '' }}">
            <a class="menu__item-link"
               href="{{ route('admin.home') }}">{{ __('app.context.overview') }}</a>
          </li>
          <li
            class="menu__item has-children{{ request()->is('admin/division') || request()->is('admin/division/create')  ? ' menu__item--active' : '' }}">
            <a class="menu__item-span" href="{{ route('admin.division.index') }}">{{ __('app.division.title.many') }}</a>
            <ul class="menu__children">
              <li class="menu__item menu__item--child{{ request()->is('admin/division') ? ' menu__item--active' : '' }}">
                <a class="menu__item-link"
                   href="{{ route('admin.division.index') }}">{{ __('app.division.overview') }}</a>
              </li>
              <li class="menu__item menu__item--child{{ request()->is('admin/division/create') ? ' menu__item--active' : '' }}">
                <a class="menu__item-link"
                   href="{{ route('admin.division.create') }}">{{ __('app.division.create') }}</a>
              </li>
            </ul>
          </li>
          <li
            class="menu__item has-children{{ request()->is('admin/subject') || request()->is('admin/subject/create') ? ' menu__item--active' : '' }}">
            <a class="menu__item-span" href="{{ route('admin.subject.index') }}">{{ __('app.subject.title.many') }}</a>
            <ul class="menu__children">
              <li class="menu__item menu__item--child{{ request()->is('admin/subject') ? ' menu__item--active' : '' }}">
                <a class="menu__item-link"
                   href="{{ route('admin.subject.index') }}">{{ __('app.subject.overview') }}</a>
              </li>
              <li class="menu__item menu__item--child{{ request()->is('admin/subject/create') ? ' menu__item--active' : '' }}">
                <a class="menu__item-link"
                   href="{{ route('admin.subject.create') }}">{{ __('app.subject.create') }}</a>
              </li>
            </ul>
          </li>
          <li
            class="menu__item has-children{{ request()->is('admin/test') || request()->is('admin/test/create')  ? ' menu__item--active' : '' }}">
            <a class="menu__item-span" href="{{ route('admin.test.index') }}">{{ __('app.test.title.many') }}</a>
            <ul class="menu__children">
              <li class="menu__item menu__item--child{{ request()->is('admin/test') ? ' menu__item--active' : '' }}">
                <a class="menu__item-link"
                   href="{{ route('admin.test.index') }}">{{ __('app.test.overview') }}</a>
              </li>
              <li class="menu__item menu__item--child{{ request()->is('admin/test/create') ? ' menu__item--active' : '' }}">
                <a class="menu__item-link"
                   href="{{ route('admin.test.create') }}">{{ __('app.test.create') }}</a>
              </li>
            </ul>
          </li>
          <li
            class="menu__item has-children{{ request()->is('admin/applicant') || request()->is('admin/applicant/create')  ? ' menu__item--active' : '' }}">
            <a class="menu__item-span" href="{{ route('admin.applicant.index', ['year' => 2019]) }}">{{ __('app.applicant.title.many') }}</a>
            <ul class="menu__children">
              <li class="menu__item menu__item--child{{ request()->is('admin/applicant') ? ' menu__item--active' : '' }}">
                <a class="menu__item-link"
                   href="{{ route('admin.applicant.index', ['year' => 2019]) }}">{{ __('app.applicant.overview') }}</a>
              </li>
              <li class="menu__item menu__item--child{{ request()->is('admin/applicant/create') ? ' menu__item--active' : '' }}">
                <a class="menu__item-link"
                   href="{{ route('admin.applicant.create') }}">{{ __('app.applicant.create') }}</a>
              </li>
            </ul>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</aside>

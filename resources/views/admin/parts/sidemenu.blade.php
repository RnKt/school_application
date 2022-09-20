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
            class="menu__item has-children{{ request()->is('admin/division') ? ' menu__item--active' : '' }}">
            <a class="menu__item-span" href="{{ route('admin.division.index') }}">{{ __('app.division.title.many') }}</a>
            <ul class="menu__children">
              <li class="menu__item menu__item--child{{ request()->is('admin/division') ? ' menu__item--active' : '' }}">
                <a class="menu__item-link"
                   href="">{{ __('app.division.overview') }}</a>
              </li>
              <li class="menu__item menu__item--child{{ request()->is('admin/division/create') ? ' menu__item--active' : '' }}">
                <a class="menu__item-link"
                   href="">{{ __('app.division.create') }}</a>
              </li>
            </ul>
          </li>
          <li
            class="menu__item has-children{{ request()->is('admin/class') ? ' menu__item--active' : '' }}">
            <a class="menu__item-span" href="{{ route('admin.class.index') }}">{{ __('app.class.title.many') }}</a>
            <ul class="menu__children">
              <li class="menu__item menu__item--child{{ request()->is('admin/class') ? ' menu__item--active' : '' }}">
                <a class="menu__item-link"
                   href="{{ route('admin.class.index') }}">{{ __('app.class.overview') }}</a>
              </li>
              <li class="menu__item menu__item--child{{ request()->is('admin/class/create') ? ' menu__item--active' : '' }}">
                <a class="menu__item-link"
                   href="{{ route('admin.class.create') }}">{{ __('app.class.create') }}</a>
              </li>
            </ul>
          </li>
          <li
            class="menu__item has-children{{ request()->is('admin/subject') ? ' menu__item--active' : '' }}">
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
        </ul>
      </li>
    </ul>
  </div>
</aside>

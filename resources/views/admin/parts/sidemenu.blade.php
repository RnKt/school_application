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
               href="{{ route('admin.home') }}">Prehlad</a>
          </li>
          <li
            class="menu__item has-children{{ request()->is('admin/applicant') ? ' menu__item--active' : '' }}">
            <a class="menu__item-span" href="{{ route('admin.applicant.index') }}">Prihlasky</a>
            <ul class="menu__children">
              <li class="menu__item menu__item--child{{ request()->is('applicant') ? ' menu__item--active' : '' }}">
                <a class="menu__item-link"
                   href="">skuska</a>
              </li>
              <li class="menu__item menu__item--child{{ request()->is('applicant/create') ? ' menu__item--active' : '' }}">
                <a class="menu__item-link"
                   href="">{{ __('menu.item.user.create') }}</a>
              </li>
            </ul>
          </li>
          <li
            class="menu__item has-children{{ request()->is('admin/class') ? ' menu__item--active' : '' }}">
            <a class="menu__item-span" href="{{ route('admin.class.index') }}">Triedy</a>
            <ul class="menu__children">
              <li class="menu__item menu__item--child{{ request()->is('class') ? ' menu__item--active' : '' }}">
                <a class="menu__item-link"
                   href="">skuska</a>
              </li>
              <li class="menu__item menu__item--child{{ request()->is('class/create') ? ' menu__item--active' : '' }}">
                <a class="menu__item-link"
                   href="">{{ __('menu.item.user.create') }}</a>
              </li>
            </ul>
          </li>
          <li
            class="menu__item has-children{{ request()->is('admin/class') ? ' menu__item--active' : '' }}">
            <a class="menu__item-span" href="{{ route('admin.class.index') }}">Predmety</a>
            <ul class="menu__children">
              <li class="menu__item menu__item--child{{ request()->is('class') ? ' menu__item--active' : '' }}">
                <a class="menu__item-link"
                   href="">skuska</a>
              </li>
              <li class="menu__item menu__item--child{{ request()->is('class/create') ? ' menu__item--active' : '' }}">
                <a class="menu__item-link"
                   href="">{{ __('menu.item.user.create') }}</a>
              </li>
            </ul>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</aside>

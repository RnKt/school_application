<aside class="menu no-print">
  <div class="menu__wrapper">
    <a href="/" class="menu__logo-link">
      <img class="menu__logo-img" src="{{ asset('media/logo.svg') }}" alt="">
    </a>
    <ul class="menu__items">
      <li class="menu__group mb-4">
        <ul>
          <li class="menu__item{{ request()->is('/') ? ' menu__item--active' : '' }}">
            <a class="menu__item-link"
               href="">test</a>
          </li>
          <li
            class="menu__item has-children{{ request()->is('user') || request()->is('user/*') ? ' menu__item--active' : '' }}">
            <a class="menu__item-span" href="">test</a>
            <ul class="menu__children">
              <li class="menu__item menu__item--child{{ request()->is('user') ? ' menu__item--active' : '' }}">
                <a class="menu__item-link"
                   href="">skuska</a>
              </li>
              <li class="menu__item menu__item--child{{ request()->is('user/create') ? ' menu__item--active' : '' }}">
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

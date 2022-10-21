<li class="nav-item dropdown dropdown-language">
    <a class="nav-link dropdown-toggle" id="dropdown-flag" href="#"
       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       <?php
        if ($current_locale == 'ar')
            $available_locales = array_reverse($available_locales);
        ?>
        @foreach($available_locales as $locale_name => $available_locale)
            @if($available_locale === $current_locale)
                <i class="flag-icon flag-icon-{{ $available_locale=='en'?"us":'eg' }}"></i>
                <span class="selected-language">{{ $locale_name }}</span></a>
            @else
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-flag">
                  <a class="dropdown-item" href="language/{{ $available_locale }}"
                     data-language="{{ $available_locale }}">
                      <i class="flag-icon flag-icon-{{ $available_locale=='en'?"us":'eg' }}"></i> {{ $locale_name }}</a>
                </div>
            @endif
        @endforeach
</li>

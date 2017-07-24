@if (isset($supportedLocales))
    <ol class="breadcrumb">
        @foreach($supportedLocales as $key => $locale)
       <li class="{{ localization()->getCurrentLocale() == $key ? 'active' : '' }}">
           <a href="{{ localization()->getLocalizedURL($key) }}"  hreflang="{{ $key  }}">
               {{ $locale->native() }}
           </a>
       </li>
        @endforeach
    </ol>
@endif

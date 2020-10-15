@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header')
    Learn4Learning
@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} Learn4Learning. @lang('All rights reserved.')
@endcomponent
@endslot
@endcomponent

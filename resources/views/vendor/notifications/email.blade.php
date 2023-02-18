@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# سلام!
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
شما این ایمیل را برای بازیابی رمز عبور از ما دریافت کرده اید

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
این لینک بازیابی در 60 دقیقه دیگر منقضی می شود.
<br>
اگر برای بازیابی رمز عبور درخواست نداده اید این ایمیل را نادیده بگیرید


{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
باتشکر,<br>
محمد رضایی
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
اگر برای کلیک بر روی دکمه بازیابی رمز عبور مشکل دارید لینک زیر کپی و در مرورگر خود جایگذاری کنید
 <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
@endslot
@endisset
@endcomponent

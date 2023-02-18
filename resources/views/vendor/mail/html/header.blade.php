<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
        <img src="{{asset('img/logo.png')}}" style="height: auto!important; width: 100%!important;" alt="">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>

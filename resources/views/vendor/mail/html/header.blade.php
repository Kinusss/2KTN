@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display:inline-block;">
<img src="{{ asset('public/img/favicon-32x32.png') }}" class="logo" />
<br />
{{ $slot }}
</a>
</td>
</tr>
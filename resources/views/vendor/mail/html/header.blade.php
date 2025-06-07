<tr>
<td class="header" style="padding:40px 0 30px 0;background:#462328;">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{asset('public/frontend/healthy_belly_top_logo.png')}}" class="logo" alt="Healthy Belly" width="300" style="height:auto;display:block;">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>

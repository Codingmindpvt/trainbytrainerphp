<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="http://198.211.110.165/trainbytrainerphp/public/images/logo.png" class="logo" alt="Train By Trainer">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>

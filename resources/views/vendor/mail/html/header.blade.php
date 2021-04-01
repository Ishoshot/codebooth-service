<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'CodeBooth')
<img src="https://res.cloudinary.com/oluwatobi/image/upload/v1614896413/codebooth/icon_visl0u.png" width="150" height="100" class="logo" alt="CodeBooth">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>

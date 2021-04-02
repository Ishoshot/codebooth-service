<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'CodeBooth')
<img src="https://res.cloudinary.com/oluwatobi/image/upload/v1617375270/codebooth/codebooth-teamUpdate_llxzxo.png" alt="CodeBooth">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>

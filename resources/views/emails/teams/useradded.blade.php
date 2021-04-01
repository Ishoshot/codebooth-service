@component('mail::message')
# Introduction
<h3>Hi {{ $name }}</h3>

You have been Invited to join team.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

@component('mail::message')
# Introduction
<h1>Hi, {{ $name }}</h1>

You sent a request to () to join team.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

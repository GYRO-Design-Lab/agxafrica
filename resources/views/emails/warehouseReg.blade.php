@component('mail::message')
Dear {{ explode(' ', trim($user))[0] }},<br>

Congratulations! <br>
Your warehouse, <b>{{ $warehouse }}</b>  has been successfully registered on the AgX.africa platform. <br>


Mafo,<br>
The {{ config('app.name') }} Team <br>
{{ "Africa's largest online commodities exchange" }}
@endcomponent
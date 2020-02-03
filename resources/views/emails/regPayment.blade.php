@component('mail::message')

Dear {{ explode(' ', trim($user))[0] }},<br>

Thank you for registering with AgX Africa. <br>
You have completed the registration/verification process for your company. We will contact you shortly


Mafo,<br>
The {{ config('app.name') }} Team <br>
Africa's largest online commodities exchange
@endcomponent

@component('mail::message')

Dear {{ explode(' ',trim($user))[0] }},<br>

Welcome to Agx Africa.<br>
Please click the button below to verify your email. Once your email has been verified, you'll proceed to verify your company: <br>
    1. Submit other company information <br>
    2. Upload required company documents <br>
    3. Make payment of $50

@component('mail::button', ['url' => $url])
    Verify Email Address
@endcomponent

Mafo,<br>
The {{ config('app.name') }} Team <br>
Africa's largest online commodities exchange
@endcomponent

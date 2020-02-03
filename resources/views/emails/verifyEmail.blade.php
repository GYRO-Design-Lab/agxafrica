@component('mail::message')

Dear {{ explode(' ',trim($user))[0] }},<br>

Welcome to AgX Africa.<br>
Please click the button below to verify your email. Once your email has been verified, you'll proceed to verify your company: <br>
    1. Submit other company information <br>
    2. Upload required company documents <br>
    3. Make payment of N20,000

<b>P.S</b> your password is <b>agx-Secret</b>

@component('mail::button', ['url' => $url])
    Verify Email Address
@endcomponent

Mafo,<br>
The {{ config('app.name') }} Team <br>
Africa's largest online commodities exchange
@endcomponent

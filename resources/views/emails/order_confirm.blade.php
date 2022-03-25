@component('mail::message')
# Hello {{$order ?? 'user_name'}},

Your order has been placed successfully

@component('mail::button', ['url' => 'www.zee.com'])
Shop More
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

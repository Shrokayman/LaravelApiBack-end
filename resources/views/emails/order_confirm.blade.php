@component('mail::message')
# Hello {{$order->user->fname}},

Your order has been placed successfully

@component('mail::button', ['url' => 'localhost:4200'])
Shop More
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

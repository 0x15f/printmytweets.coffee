@component('mail::message')
Hey!

Your order is being processed! You can view your order status below and we'll let you know once it ships.

@component('mail::button', ['url' => route('order', ['id' => $info['id']])])
View Order
@endcomponent

Thank you,
Print My Tweets Team
@endcomponent
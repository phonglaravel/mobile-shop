@component('mail::message')
Dear {{$email}},

Cảm ơn đã đặt hàng:
@foreach ($data as $item)
    <li>{{ $item }}</li>
@endforeach

@component('mail::button', ['url' => ''])

@endcomponent

Thanks,<br>

@endcomponent

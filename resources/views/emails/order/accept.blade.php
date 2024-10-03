@component('mail::message', ['email' => isset($email) ? $email : ''])

<p>Hi {{$farmer->last_name}},</p>

<p>Driver {{isset($driver->last_name) ? $driver->last_name : ''}} has been accept your order. Please ready for that.</p>

Order Reference: {{$order->order_reference}}


<p>If you've any question or concerns, feel free to contact me at info@farmbuddy.lk or +94 0777123456</p>

<p>Thank you.</p>

<p>Best Regards,</p>
<p>Farmbuddy</p>

@endcomponent

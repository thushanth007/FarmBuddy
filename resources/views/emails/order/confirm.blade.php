@component('mail::message', ['email' => isset($email) ? $email : ''])

<p>Hi {{$basic->last_name}},</p>

<p>Your order has been confirmed. Please pick it up at our farm.</p>

Order Reference: {{$order->order_reference}}


<p>If you've any question or concerns, feel free to contact me at info@farmbuddy.lk or +94 0777123456</p>

<p>Thank you.</p>

<p>Best Regards,</p>
<p>Farmbuddy</p>

@endcomponent

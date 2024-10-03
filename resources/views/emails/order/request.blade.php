@component('mail::message', ['email' => isset($email) ? $email : ''])

<p>Hi {{$driver->last_name}},</p>

<p>Congratulations! You got an order request from {{isset($farmer->last_name) ? $farmer->last_name : ''}}.</p>

<p>
    <a href="{{url('/admin/driver-request/'.$request->driver_reference)}}">Click here & accept the order</a>
</p>

<p>If you've any question or concerns, feel free to contact me at info@farmbuddy.lk or +94 0777123456</p>

<p>Thank you.</p>

<p>Best Regards,</p>
<p>Farmbuddy</p>

@endcomponent

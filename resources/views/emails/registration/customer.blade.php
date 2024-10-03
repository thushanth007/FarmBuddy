@component('mail::message', ['email' => isset($email) ? $email : ''])

<p>Hi {{$user->name}},</p>

<p>Congratulations! Your registation is Confirmed!</p>

<p>You've successfully completed registration for Farmbuddy application.</p>

<p>If you've any question or concerns, feel free to contact me at info@farmbuddy.lk or +94 0777123456</p>

<p>Thank you.</p>

<p>Best Regards,</p>
<p>Farmbuddy</p>

@endcomponent

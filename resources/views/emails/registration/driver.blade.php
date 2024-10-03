@component('mail::message', ['email' => isset($email) ? $email : ''])

<p>Hi {{$user->name}},</p>

<p>Congratulations! Your registation is Confirmed!</p>

<p>You've successfully registered for Farmbuddy application.</p>

<p>
    Username : {{$user->email}}
<br>
    Login URL : <a href="{{url('/admin/login')}}">Click here to login</a>
</p>

<p>If you've any question or concerns, feel free to contact me at info@farmbuddy.lk or +94 0777123456</p>

<p>Thank you.</p>

<p>Best Regards,</p>
<p>Farmbuddy</p>

@endcomponent

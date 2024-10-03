@component('mail::message', ['email' => isset($email) ? $email : ''])
<p><b>Contact Us Message</b><br></p>

<p># Name  : {{$contact_us->name}}</p>
<p># Email : {{$contact_us->email}}</p><br>

<p>Message :  {{$contact_us->message}}</p>

<p>Thank you.</p>

@endcomponent
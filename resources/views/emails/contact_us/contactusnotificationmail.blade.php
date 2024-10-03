@component('mail::message', ['email' => isset($email) ? $email : ''])
<p>Dear {{$contact_us->name}},</p>
<p>We appreciate your feedback and responses. Our team person will contact to you in 24 hours.</p>

<p>Thank you.</p>

<p>Regards,</p>
<p>Farmbuddy</p>

@endcomponent

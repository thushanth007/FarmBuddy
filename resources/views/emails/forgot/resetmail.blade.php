@component('mail::message', ['email' => isset($email) ? $email : ''])
<p>Hello,</p><br>

<p>Some one (probably you) has requested a new Password for your account.</p>

<p>To change your password, Use this link below to get started: <a href="{{url('/reset-password/'.$token)}}">Reset Your Password</a></p>


<br><p>Thank you.</p>

<p>Farmbuddy Team.</p>
@endcomponent

@component('mail::message', ['email' => isset($email) ? $email : ''])

<p>Hi {{$farmer->last_name}},</p>

<p>Your product quantity has fallen below 5. Please restock or upgrade the product in your shop.</p>

<p>Product Name: {{ $product->name }}</p>
<p>Product Quantity: {{ $product->stock }}</p>

<p>If you've any question or concerns, feel free to contact me at info@farmbuddy.lk or +94 0777123456</p>

<p>Thank you.</p>

<p>Best Regards,</p>
<p>Farmbuddy</p>

@endcomponent

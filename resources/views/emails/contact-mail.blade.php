{{-- @component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
 --}}

 <h1>Dear {{ $name }}</h1>

 <p>The Contact Form has been received and is currently being reviewed.</p>

 <p>We will get back to you in the next 3 business days.</p>
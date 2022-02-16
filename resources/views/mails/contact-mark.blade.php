@component('mail::message')
# You got a new contact email
 
**Name: ** {{ $email['name'] }}

**Email: ** {{ $email['email'] }}

**Message: ** {{ $email['message'] }}
 
@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
Visit Library
@endcomponent
 
Thanks,<br>
{{ config('app.name') }}
@endcomponent
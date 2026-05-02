<x-mail::message>
# Welcome, {{ $user->name }}

Thank you for registering with us. We are excited to have you on board!

<x-mail::button :url="url('/')">
Get Started
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

@component('mail::message')
# Wellcome to, {{ config('app.name') }}

Hello, {{ $user->name  }}

Your account is Deleted , Account associate with {{ $user->email }}

@component('mail::button', ['url' => 'javascript:void(0)'])
Account Deleted
@endcomponent

If you have any query, please contact with support.
Thanks,<br>
{{ $user->name }}
@endcomponent

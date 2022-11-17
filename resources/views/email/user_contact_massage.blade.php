@component('mail::message')
# Wellcome to, {{ config('app.name') }}

Hello, {{ $contact->contact_name  }}
<br>
Reply to,<p>{{ $contact->contact_reply  }}</p>


@component('mail::button', ['url' => 'javascript:void(0)'])
Link
@endcomponent


@endcomponent

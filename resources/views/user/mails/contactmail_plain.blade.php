Hello {{ $contactMail->name }},
New email from customer.

Name&nbsp;: {{ $contactMail->name }}
Email: {{ $contactMail->email }}

value:


{{ $contactMail->message }}


Thank You,
{{ $contactMail->name }}
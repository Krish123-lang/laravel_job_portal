<x-mail::message>

    Congratulations, {{ $name }}!
    You have been shortlisted for the job: {{ $title }}. Please be prepared for interview.

    Best regards,
    {{ config('app.name') }}
</x-mail::message>

<x-mail::message>
# Introduction

Congratulations! You're not a premium user.
<p>Your purchase details: </p>
<p> {{$plan}} </p>
<p>Your plan ends on: {{$billingEnds}} </p>
<x-mail::button :url="''">
Post a job
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

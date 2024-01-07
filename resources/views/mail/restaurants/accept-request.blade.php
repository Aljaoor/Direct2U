<x-mail::message>
    Hello {{$user->name}} <br>
    Your restaurant accepted and start display in our website<br>
    you can manage it from the our dashboard ,add categories and meals

<x-mail::button :url='$url'>
    Dashboard
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

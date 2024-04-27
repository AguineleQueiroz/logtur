<x-mail::message>
# {{ $title }}!!

    Hello {{ $client->name }}!!
    {{ $content }}
<a href="#" style="margin-bottom: 15px;">
    <img src="{{ asset($image) }}" class="Cannyon" alt="Monthly Email">
</a>
<x-mail::button :url="''" style="display:flex;justify-self: start;">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

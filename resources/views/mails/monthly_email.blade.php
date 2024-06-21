<x-mail::message>
# {{ $title }}!!
<div style="display:flex;flex-direction:column;justify-content: start;width: 45rem;">
    Olá {{ $client->name }}!! <br>
    {{ $content }} <br><br>
    <a href="#" style="margin-bottom: 15px;">
        <img src="{{ asset($image) }}" class="Cannyon" alt="Monthly Email">
    </a>
    <div style="display:flex;justify-content: center;">
        <a href="https://wa.me/5538998427814" style="display: inline-block; padding: 10px 35px; font-size: 16px; color: #fff; background-color: #3DC2EC; text-decoration: none; border-radius: 5px;">
            Reservar
        </a>
    </div>
</div>
{{ config('app.name') }}<br>
Contato: +55 38 9 98427814<br>
Email: leiatur.contato@gmail.com<br>

</x-mail::message>

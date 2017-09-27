<div class="bg-aside__caixa bg-aside__caixa--arquivos">
    <h3 class="bg-aside__titulo">@lang("messages.caixa.arquivos")</h3>
    <div class="bg-aside__corpo">
        <ul class="bg-aside__lista bg-aside__lista--arquivo">
            @foreach ($arquivos as $arquivo)
                <li class="bg-aside__item"><a class="bg-aside__link" href="/arquivo/{{$arquivo->ano}}/{{sprintf("%02u", $arquivo->mes)}}">{{sprintf("%02u", $arquivo->mes)}}/{{$arquivo->ano}}</a></li>
            @endforeach
        </ul>
    </div>
</div>
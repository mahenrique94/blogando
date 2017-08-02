<div class="bg-aside__caixa">
    <h3 class="bg-aside__titulo">@lang("messages.caixa.arquivos")</h3>
    <ul class="bg-aside__lista">
        @foreach ($arquivos as $arquivo)                
            <li class="bg-aside__item"><a class="bg-aside__link" href="/arquivo/{{$arquivo->ano}}/{{sprintf("%02u", $arquivo->mes)}}">{{sprintf("%02u", $arquivo->mes)}}/{{$arquivo->ano}}</a></li>
        @endforeach
    </ul> 
</div>
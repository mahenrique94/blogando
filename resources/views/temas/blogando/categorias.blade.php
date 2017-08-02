<div class="bg-aside__caixa">
    <h3 class="bg-aside__titulo">@lang("messages.caixa.categorias")</h3>
    <ul class="bg-aside__lista">
        @foreach ($categorias as $categoria)                
            <li class="bg-aside__item"><a class="bg-aside__link" href="/categoria/{{$categoria->slug}}">{{$categoria->descricao}}</a></li>
        @endforeach
    </ul>
</div>
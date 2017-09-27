<div class="bg-aside__caixa bg-aside__caixa--categorias">
    <h3 class="bg-aside__titulo">@lang("messages.caixa.categorias")</h3>
    <div class="bg-aside__corpo">
        <ul class="bg-aside__lista bg-aside__lista--categorias">
            @foreach ($categorias as $categoria)
                <li class="bg-aside__item"><a class="bg-aside__link bg-{{$categoria->slug}}" href="/categoria/{{$categoria->slug}}">{{$categoria->descricao}}</a></li>
            @endforeach
        </ul>
    </div>
</div>
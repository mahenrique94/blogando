<div class="bg-p-perfils">
    <h1 class="bg-p-perfils__titulo">@lang("messages.titulo.perfilescolher")</h1>
    <div class="bg-p-perfils__conteudo">
        <ul class="bg-p-perfils__lista">
            @foreach (old("perfils") as $perfil)
                <li class="bg-p-perfils__lista___item"><a href="/painel/acessar/perfil/{{$perfil->id}}" class="bg-p-perfils__lista___link">{{$perfil->grupo->descricao}}</a></li>
            @endforeach
        </ul>
    </div>
</div>

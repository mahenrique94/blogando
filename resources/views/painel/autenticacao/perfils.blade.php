@extends("painel.config.pagina")
@section("pagina", "Escolher perfil")
@section("conteudo")
    <div class="bg-p-perfils">
        <h1 class="bg-p-perfils__titulo">@lang("messages.titulo.perfilescolher")</h1>
        <div class="bg-p-perfils__conteudo">
            <ul class="bg-p-perfils__lista">
                @foreach ($perfils as $perfil)
                    <li class="bg-p-perfils__lista___item"><a class="bg-p-perfils__lista___link is-{{strtolower($perfil->grupo->descricao)}}" href="/painel/acessar/perfil/{{$perfil->id}}"><i class="{{$perfil->icone()}} bg-p-perfils__lista___icone"></i>{{$perfil->grupo->descricao}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
@stop
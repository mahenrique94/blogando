<div class="bg-autor">
    <img alt="{{$post->perfil->nome}}" class="bg-autor__imagem" src="/arquivo/download/perfil/{{$post->perfil->imagem}}">
    <div class="bg-autor__informacoes">
        <h3 class="bg-autor__nome">{{$post->perfil->nome}}</h3>
        <p class="bg-autor__perfil">{{$post->perfil->descricao}}</p>
        <ul class="bg-aside__lista bg-aside__lista--redesocial">
            @foreach ($post->perfil->usuario->redessociais as $redesocial)
                <li class="bg-aside__item"><a class="bg-aside__link bg-{{$redesocial->redesocial->slug}}" href="{{$redesocial->link}}" target="_blank"><i class="bg-aside__icone {{$redesocial->redesocial->icone}}"></i></a></li>
            @endforeach
        </ul>
    </div>
</div>
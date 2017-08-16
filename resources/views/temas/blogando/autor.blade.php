<div class="bg-autor">
    <img alt="{{$post->autor->nome}}" class="bg-autor__imagem" src="/arquivo/download/usuarios/{{$post->autor->imagem}}">
    <div class="bg-autor__informacoes">
        <h3 class="bg-autor__nome">{{$post->autor->nome}}</h3>
        <p class="bg-autor__perfil">{{$post->autor->perfil}}</p>
        <ul class="bg-aside__lista bg-aside__lista--redesocial">
            @foreach ($post->autor->redessociais as $redesocial)
                <li class="bg-aside__item"><a class="bg-aside__link bg-{{$redesocial->redesocial->slug}}" href="{{$redesocial->link}}"><i class="bg-aside__icone {{$redesocial->redesocial->icone}}"></i></a></li>
            @endforeach
        </ul>
    </div>
</div>
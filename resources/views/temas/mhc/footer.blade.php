@section("footer")
    <ul class="bg-footer__lista">
        <li class="bg-footer__item"><a class="bg-footer__link bg-footer__link--titulo" href="#">Redes Sociais</a></li>
        @foreach ($blogredessociais as $redesocial)
            <li class="bg-footer__item"><a class="bg-footer__link" href="{{$redesocial->link}}" target="_blank">{{$redesocial->redesocial->descricao}}</a></li>
        @endforeach
    </ul>
    <ul class="bg-footer__lista">
        <li class="bg-footer__item"><a class="bg-footer__link bg-footer__link--titulo" href="#">Categorias</a></li>
        @foreach ($categorias as $categoria)
            <li class="bg-footer__item"><a class="bg-footer__link" href="/categoria/{{$categoria->slug}}">{{$categoria->descricao}}</a></li>
        @endforeach
    </ul>
    <ul class="bg-footer__lista">
        <li class="bg-footer__item"><a class="bg-footer__link bg-footer__link--titulo" href="#">Posts Recentes</a></li>
        @foreach ($postsrecentes as $post)
            <li class="bg-footer__item"><a class="bg-footer__link" href="/{{$post->slug}}">{{$post->titulo}}</a></li>
        @endforeach
    </ul>
    @include("temas.blogando.newsletter")
    <div class="bg-footer__sponsorship">
        <a class="bg-footer__sponsorship___link" href="https://m.do.co/c/f34f73a7da3e" target="_blank"><img alt="Powered by Digital Ocean" class="bg-footer__sponsorship___image" src="/assets/temas/mhc/sponsorship/digitalocean.svg"></a>
    </div>
@stop
@section("footer")
    <div class="bg-footer__redessociais">
        <ul class="bg-footer__redessociais___lista">
            @foreach ($blogredessociais as $redesocial)
                <li class="bg-footer__redessociais___item"><a class="bg-footer__redessociais___link" href="{{$redesocial->link}}" target="_blank"><i class="{{$redesocial->redesocial->icone}}"></i></a></li>
            @endforeach
        </ul>
    </div>
    <ul class="bg-footer__lista">
        <li class="bg-footer__item"><a class="bg-footer__link bg-footer__link--titulo" href="#">Categorias</a></li>
        @foreach ($categorias as $categoria)
            <li class="bg-footer__item"><a class="bg-footer__link" href="/categoria/{{$categoria->slug}}">{{$categoria->descricao}}</a></li>
        @endforeach
    </ul>
    <ul class="bg-footer__lista">
        <li class="bg-footer__item"><a class="bg-footer__link bg-footer__link--titulo" href="#">Últimas notícias</a></li>
        @foreach ($postsrecentes as $post)
            <li class="bg-footer__item"><a class="bg-footer__link" href="/{{$post->slug}}">{{$post->titulo}}</a></li>
        @endforeach
    </ul>
    @include("temas.playpix.newsletter")
@stop
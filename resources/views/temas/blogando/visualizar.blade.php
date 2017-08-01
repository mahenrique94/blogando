@extends("config.pagina")
@include("temas.blogando.header")
@section("conteudo")
    <section class="bg-conteudo--visualizar u-content">
        <section class="bg-visualizar">
            <article class="bg-post">
                <a href="/{{$post->slug}}"><div class="bg-post__imagem" style="background-image: url(/arquivo/download/posts/{{date_format(date_create($post->datapostagem), "Y")}}/{{date_format(date_create($post->datapostagem), "m")}}/{{$post->imagem}});"></div></a>
                <header class="bg-post__cabecalho">
                    <h2 class="bg-post__titulo"><a href="/{{$post->slug}}">{{$post->titulo}}</a></h2>
                    <p class="bg-post__informacoes">
                        Postado em <span class="bg-post__data">{{date_format(date_create($post->datapostagem), $blog->parametros->formatodatahora->formato)}}</span> por <a class="bg-post__autor" href="/autor/{{$post->autor->slug}}">{{$post->autor->nome}}</a>                        
                    </p>
                    <p class="bg-post__categorias">
                        @foreach ($post->categorias as $categoria)
                            <a class="bg-post__categoria" href="/categoria/{{$categoria->categoria->slug}}">{{$categoria->categoria->descricao}}</a>
                        @endforeach
                    </p>
                </header>
                <section class="bg-post__conteudo">{!!$post->conteudohtml!!}</section>
                <footer class="bg-post__rodape">
                    <p class="bg-post__tags">
                        @foreach ($post->tags as $tag)
                            <a class="bg-post__tag" href="/tag/{{$tag->tag->slug}}">{{$tag->tag->descricao}}</a>
                        @endforeach
                    </p>
                </footer>
            </article>
        </section>
    </section>
@stop
@include("temas.blogando.footer")
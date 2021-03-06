@extends("config.pagina")
@section("titulo"){{$post->titulo}}@stop
@include("temas.blogando.header")
@section("conteudo")
    <section class="bg-conteudo--visualizar u-content">
        <section class="bg-visualizar">
            <article class="bg-post">
                @unless (Auth::guest())
                    <a class="bg-post__editar o-button--tie o-button--medium" href="/painel/post/{{$post->id}}"><i class="icon-pencil"></i>@lang("messages.botao.editar")</a>
                @endunless
                <a href="/{{$post->slug}}"><div class="bg-post__imagem" style="background-image: url({{$blog->url}}/arquivo/download/posts/{{date_format(date_create($post->datapostagem), "Y")}}/{{date_format(date_create($post->datapostagem), "m")}}/{{$post->imagem}});"></div></a>
                <header class="bg-post__cabecalho">
                    <h2 class="bg-post__titulo"><a href="/{{$post->slug}}">{{$post->titulo}}</a></h2>
                    <p class="bg-post__informacoes">
                        Postado em <time class="bg-post__data">{{date_format(date_create($post->datapostagem), $blog->parametros->formatodatahora->formato)}}</time> por <a class="bg-post__autor" href="/autor/{{$post->perfil->slug}}">{{$post->perfil->nome}}</a>
                    </p>
                    <p class="bg-post__categorias">
                        @foreach ($post->categorias as $categoria)
                            <a class="bg-post__categoria bg-{{$categoria->categoria->slug}}" href="/categoria/{{$categoria->categoria->slug}}">{{$categoria->categoria->descricao}}</a>
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
        @if ($blog->parametros->permitircompartilhamentos && ($blog->parametros->idtipocompartilhamento === 1 || $blog->parametros->idtipocompartilhamento === 3))
            @include("temas.blogando.compartilhamento-post")
        @endif
        @include("temas.blogando.autor")
        @if ($blog->parametros->permitircomentarios && $blog->parametros->permitircomentariosanonimos)
            @include("temas.blogando.comentario")
        @endif
        @if ($blog->parametros->permitircomentarios && $blog->parametros->utilizarcomentariosdisqus)
            @include("temas.blogando.disqus")
        @endif
    </section>
@stop
@include("temas.blogando.footer")
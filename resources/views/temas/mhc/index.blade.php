@extends("config.pagina")
@section("titulo"){{$blog->titulo}}@stop
@include("temas.blogando.header")
@section("conteudo")
    <section class="bg-conteudo u-content">
        @include("temas.blogando.resultado")
        <section class="bg-posts">
            @foreach ($posts as $post)
                <article class="bg-post">
                    @unless (Auth::guest())
                        <a class="bg-post__editar o-button--tie o-button--medium" href="/painel/post/{{$post->id}}"><i class="icon-pencil"></i>@lang("messages.botao.editar")</a>
                    @endunless
                    <header class="bg-post__cabecalho">
                        <h2 class="bg-post__titulo">
                            @if ($blog->parametros->permitircomentarios && $blog->parametros->permitircomentariosanonimos)
                                <span class="bg-post__comentario"><i class="icon-chat"></i>{{count($post->comentarios)}}</span>
                            @endif
                            <a class="bg-post__link" href="/{{$post->slug}}">{{$post->titulo}}</a>
                        </h2>
                        <p class="bg-post__informacoes">
                            Postado em <time class="bg-post__data">{{date_format(date_create($post->datapostagem), $blog->parametros->formatodatahora->formato)}}</time> por <a class="bg-post__autor" href="/autor/{{$post->perfil->slug}}">{{$post->perfil->nome}}</a>
                        </p>
                        <p class="bg-post__categorias">
                            @foreach ($post->categorias as $categoria)
                                <a class="bg-post__categoria bg-{{$categoria->categoria->slug}}" href="/categoria/{{$categoria->categoria->slug}}">{{$categoria->categoria->descricao}}</a>
                            @endforeach
                        </p>
                    </header>
                    <a href="/{{$post->slug}}"><div class="bg-post__imagem bg-post__imagem--padding" style="background-image: url({{$blog->url}}/arquivo/download/posts/{{date_format(date_create($post->datapostagem), "Y")}}/{{date_format(date_create($post->datapostagem), "m")}}/{{$post->imagem}});"></div></a>
                    <section class="bg-post__conteudo">{{$post->conteudoresumido}}...</section>
                    <footer class="bg-post__rodape">
                        <a class="bg-post__continuarLendo" href="/{{$post->slug}}">Continuar lendo</a>
                        <p class="bg-post__tags">
                            @foreach ($post->tags as $tag)
                                <a class="bg-post__tag" href="/tag/{{$tag->tag->slug}}">{{$tag->tag->descricao}}</a>
                            @endforeach
                        </p>
                    </footer>
                </article>
            @endforeach
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-format="fluid"
                 data-ad-layout-key="-47+cx+u-m6+z4"
                 data-ad-client="ca-pub-5664132862898238"
                 data-ad-slot="4955258141"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
            @include("temas.blogando.paginacao")
        </section>
        <aside class="bg-aside">
            @if ($blog->aparencia->mostrarnewsletter)
                @include("temas.blogando.newsletter")
            @endif
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- adsense-block-01 -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-5664132862898238"
                 data-ad-slot="1028331867"
                 data-ad-format="auto"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
            @if ($blog->aparencia->mostrarpesquisa)
                @include("temas.blogando.pesquisar")
            @endif
            @if ($blog->aparencia->mostrarredessociais)
                @include("temas.blogando.redessociais")
            @endif
            @if ($blog->aparencia->mostrarpostsrecentes)
                @include("temas.blogando.postsrecentes")
            @endif
            @if ($blog->aparencia->mostrarcategorias)
                @include("temas.blogando.categorias")
            @endif
            @if ($blog->aparencia->mostrartags)
                @include("temas.blogando.tags")
            @endif
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- adsense-block-02 -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-5664132862898238"
                 data-ad-slot="2069950790"
                 data-ad-format="auto"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
            @if ($blog->aparencia->mostrararquivos)
                @include("temas.blogando.arquivos")
            @endif
            @if ($blog->parametros->permitircompartilhamentos && ($blog->parametros->idtipocompartilhamento === 1 || $blog->parametros->idtipocompartilhamento === 2))
                @include("temas.blogando.compartilhamento-blog")
            @endif
        </aside>
    </section>
@stop
@include("temas.mhc.footer")
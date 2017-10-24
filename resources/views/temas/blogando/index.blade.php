@extends("config.pagina")
@section("titulo"){{$blog->titulo}}@stop
@include("temas.blogando.header")
@section("conteudo")
    <section class="bg-conteudo u-content">
        @if (isset($filtro) && !is_null($filtro) && !empty($filtro))
            @if (count($posts) > 0)
                @if (count($posts) > 1)
                    <p class="bg-resultado">Foram encontrados <strong>{{$resultado}}</strong> posts para o título <strong>{{$filtro}}</strong>.</p>
                @else
                    <p class="bg-resultado">Foi encontrado <strong>{{$resultado}}</strong> post para o título <strong>{{$filtro}}</strong>.</p>
                @endif
            @else
                <p class="bg-resultado">Não há posts para o título <strong>{{$filtro}}</strong>.</p>
            @endif
        @endif

        @if (isset($mes) && !is_null($mes) && !empty($mes) && isset($ano) && !is_null($ano) && !empty($ano))
            @if (count($posts) > 0)
                @if (count($posts) > 1)
                    <p class="bg-resultado">Foram encontrados <strong>{{$resultado}}</strong> posts o mês <strong>{{$mes}}</strong> do ano <strong>{{$ano}}</strong>.</p>
                @else
                    <p class="bg-resultado">Foi encontrado <strong>{{$resultado}}</strong> post o mês <strong>{{$mes}}</strong> do ano <strong>{{$ano}}</strong>.</p>
                @endif
            @else
                <p class="bg-resultado">Não há posts para o mês <strong>{{$mes}}</strong> do ano <strong>{{$ano}}</strong>.</p>
            @endif
        @endif

        @if (isset($categoria) && !is_null($categoria) && !empty($categoria))
            @if (count($posts) > 0)
                @if (count($posts) > 1)
                    <p class="bg-resultado">Foram encontrados <strong>{{$resultado}}</strong> posts para a categoria <strong>{{$categoria->descricao}}</strong>.</p>
                @else
                    <p class="bg-resultado">Foi encontrado <strong>{{$resultado}}</strong> post para a categoria <strong>{{$categoria->descricao}}</strong>.</p>
                @endif
            @else
                <p class="bg-resultado">Não há posts para a categoria <strong>{{$categoria->descricao}}</strong>.</p>
            @endif
        @endif

        @if (isset($tag) && !is_null($tag) && !empty($tag))
            @if (count($posts) > 0)
                @if (count($posts) > 1)
                    <p class="bg-resultado">Foram encontrados <strong>{{$resultado}}</strong> posts para a tag <strong>{{$tag->descricao}}</strong>.</p>
                @else
                    <p class="bg-resultado">Foi encontrado <strong>{{$resultado}}</strong> post para a tag <strong>{{$tag->descricao}}</strong>.</p>
                @endif
            @else
                <p class="bg-resultado">Não há posts para a tag <strong>{{$tag->descricao}}</strong>.</p>
            @endif
        @endif
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
                            Postado em <time class="bg-post__data">{{date_format(date_create($post->datapostagem), $blog->parametros->formatodatahora->formato)}}</time> por <a class="bg-post__autor" href="/autor/{{$post->autor->slug}}">{{$post->autor->nome}}</a>                        
                        </p>
                        <p class="bg-post__categorias">
                            @foreach ($post->categorias as $categoria)
                                <a class="bg-post__categoria bg-{{$categoria->categoria->slug}}" href="/categoria/{{$categoria->categoria->slug}}">{{$categoria->categoria->descricao}}</a>
                            @endforeach
                        </p>
                    </header>
                    <a href="/{{$post->slug}}"><div class="bg-post__imagem" style="background-image: url(/arquivo/download/posts/{{date_format(date_create($post->datapostagem), "Y")}}/{{date_format(date_create($post->datapostagem), "m")}}/{{$post->imagem}});"></div></a>
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
            @include("temas.blogando.paginacao")
        </section>
        <aside class="bg-aside">
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
            @if ($blog->aparencia->mostrararquivos)
                @include("temas.blogando.arquivos")
            @endif
            @if ($blog->aparencia->mostrarnewsletter)
                @include("temas.blogando.newsletter")
            @endif
        </aside>
    </section>
@stop
@include("temas.blogando.footer")
@extends("config.pagina")
@section("titulo"){{$blog->titulo}}@stop
@include("temas.playpix.header")
@section("conteudo")
    <section class="u-content">
        <div class="bg-info">A <a class="bg-marca" href="/"><strong>Playpix</strong></a> é um canal de notícias atualizado diariamente</div>
        @if (isset($filtro) && !is_null($filtro) && !empty($filtro))
            <p class="bg-resultado">Foi encontrado <strong>{{isset($postssemdestaque) ? count($postssemdestaque) : count($posts)}}</strong> {{isset($postssemdestaque) ? count($postssemdestaque) : count($posts) > 1 ? "posts" : "post"}} para o título <strong>{{$filtro}}</strong>.</p>
        @endif
        @if (isset($mes) && !is_null($mes) && !empty($mes) && isset($ano) && !is_null($ano) && !empty($ano))
            <p class="bg-resultado">Foi encontrado <strong>{{isset($postssemdestaque) ? count($postssemdestaque) : count($posts)}}</strong> {{isset($postssemdestaque) ? count($postssemdestaque) : count($posts) > 1 ? "posts" : "post"}} para o mês <strong>{{$mes}}</strong> do ano <strong>{{$ano}}</strong>.</p>
        @endif
        @if (isset($autor) && !is_null($autor) && !empty($autor))
            <p class="bg-resultado">Foi encontrado <strong>{{isset($postssemdestaque) ? count($postssemdestaque) : count($posts)}}</strong> {{isset($postssemdestaque) ? count($postssemdestaque) : count($posts) > 1 ? "posts" : "post"}} para o autor <strong>{{$autor->nome}}</strong>.</p>
        @endif
        @if (isset($categoria) && !is_null($categoria) && !empty($categoria))
            <p class="bg-resultado">Foi encontrado <strong>{{isset($postssemdestaque) ? count($postssemdestaque) : count($posts)}}</strong> {{isset($postssemdestaque) ? count($postssemdestaque) : count($posts) > 1 ? "posts" : "post"}} para a categoria <strong>{{$categoria->descricao}}</strong>.</p>
        @endif
        @if (isset($tag) && !is_null($tag) && !empty($tag))
            <p class="bg-resultado">Foi encontrado <strong>{{isset($postssemdestaque) ? count($postssemdestaque) : count($posts)}}</strong> {{isset($postssemdestaque) ? count($postssemdestaque) : count($posts) > 1 ? "posts" : "post"}} para a tag <strong>{{$tag->descricao}}</strong>.</p>
        @endif
        @if ($metodo === "index")
            <section class="bg-banner">
                @foreach ($postsdestaque as $post)
                    <div class="bg-banner__wrap bg-banner__wrap--{{$loop->index + 1}}">
                        <div class="bg-banner__post">
                            <a href="/{{$post->slug}}"><div class="bg-banner__post___imagem" style="background-image: url(/arquivo/download/posts/{{date_format(date_create($post->datapostagem), "Y")}}/{{date_format(date_create($post->datapostagem), "m")}}/{{$post->imagem}});"></div></a>
                            <div class="bg-banner__post___info">
                                @foreach ($post->categorias as $categoria)
                                    <a class="bg-banner__post___categoria" href="/categoria/{{$categoria->categoria->slug}}">{{$categoria->categoria->descricao}}</a>
                                @endforeach
                                <time class="bg-banner__post___data">{{date_format(date_create($post->datapostagem), $blog->parametros->formatodatahora->formato)}}</time>
                                <a class="bg-banner__post___titulo" href="/{{$post->slug}}">{{$post->titulo}}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </section>
        @endif
        <section class="bg-posts">
            @foreach ($posts as $post)
                <article class="bg-post">
                    @unless (Auth::guest())
                        <a class="bg-post__editar o-button--tie o-button--medium" href="/painel/post/{{$post->id}}"><i class="icon-pencil"></i>@lang("messages.botao.editar")</a>
                    @endunless
                    <a href="/{{$post->slug}}"><div class="bg-post__imagem" style="background-image: url(/arquivo/download/posts/{{date_format(date_create($post->datapostagem), "Y")}}/{{date_format(date_create($post->datapostagem), "m")}}/{{$post->imagem}});"></div></a>
                    <div class="bg-post__wrap">
                        <header class="bg-post__cabecalho">
                            <p class="bg-post__tags">
                                @foreach ($post->tags as $tag)
                                    <a class="bg-post__tag" href="/tag/{{$tag->tag->slug}}">{{$tag->tag->descricao}}</a>
                                @endforeach
                            </p>
                            <h2 class="bg-post__titulo">
                                <a class="bg-post__link" href="/{{$post->slug}}">{{$post->titulo}}</a>
                            </h2>
                        </header>
                        <section class="bg-post__conteudo">{{$post->conteudoresumido}}.</section>
                        <footer class="bg-post__rodape">
                            <p class="bg-post__informacoes">
                                <time class="bg-post__data">{{date_format(date_create($post->datapostagem), $blog->parametros->formatodatahora->formato)}}</time> por <a class="bg-post__autor" href="/autor/{{$post->autor->slug}}">{{$post->autor->nome}}</a>
                            </p>
                            <p class="bg-post__categorias">
                                <span style="color: #BFBFBF;">- Em</span>
                                @foreach ($post->categorias as $categoria)
                                    <a class="bg-post__categoria" href="/categoria/{{$categoria->categoria->slug}}">{{$categoria->categoria->descricao}}</a>
                                @endforeach
                            </p>
                        </footer>
                    </div>
                </article>
            @endforeach
        </section>
        <aside class="bg-aside">
            @if ($blog->aparencia->mostrarredessociais)
                @include("temas.blogando.redessociais")
            @endif
            @if ($blog->aparencia->mostrarnewsletter)
                @include("temas.playpix.newsletter")
            @endif
            @if ($blog->aparencia->mostrarpostsrecentes)
                @include("temas.playpix.postsrecentes")
            @endif
            <div class="bg-publicidade--box">
                <a href="https://www.facebook.com/frasesclub10/" target="_blank">
                    <img alt="Banner Frases Club" class="bg-publicidade__imagem" src="/assets/temas/playpix/publicidade/box_01.jpg">
                </a>
            </div>
            @if ($blog->aparencia->mostrarcategorias)
                @include("temas.blogando.categorias")
            @endif
            @if ($blog->aparencia->mostrartags)
                @include("temas.blogando.tags")
            @endif
            @if ($blog->aparencia->mostrararquivos)
                @include("temas.blogando.arquivos")
            @endif
            <div class="bg-publicidade--box">
                <a href="https://www.facebook.com/proflucasmartins01/" target="_blank">
                    <img alt="Banner Lucas Martins" class="bg-publicidade__imagem" src="/assets/temas/playpix/publicidade/box_02.jpg">
                </a>
            </div>
        </aside>
    </section>
@stop
@include("temas.playpix.footer")
@include("temas.playpix.rodape")
@extends("config.pagina")
@section("titulo"){{$blog->titulo}}@stop
@include("temas.playpix.header")
@section("conteudo")
    <section class="u-content">
        <section class="bg-banner">
            @for ($i = 0; $i <= 2; $i++)
                <div class="bg-banner__wrap bg-banner__wrap--{{$i + 1}}">
                    <div class="bg-banner__post">
                        <a href="{{$posts[$i]->slug}}"><div class="bg-banner__post___imagem" style="background-image: url(/arquivo/download/posts/{{date_format(date_create($posts[$i]->datapostagem), "Y")}}/{{date_format(date_create($posts[$i]->datapostagem), "m")}}/{{$posts[$i]->imagem}});"></div></a>
                        <div class="bg-banner__post___info">
                            @foreach ($posts[$i]->categorias as $categoria)
                                <a class="bg-banner__post___categoria" href="/categoria/{{$categoria->categoria->slug}}">{{$categoria->categoria->descricao}}</a>
                            @endforeach
                            <time class="bg-banner__post___data">{{date_format(date_create($posts[$i]->datapostagem), $blog->parametros->formatodatahora->formato)}}</time>
                            <a class="bg-banner__post___titulo" href="{{$posts[$i]->slug}}">{{$posts[$i]->titulo}}</a>
                        </div>
                    </div>
                </div>
            @endfor
        </section>
        <section class="bg-posts">
            @for ($i = 3; $i < count($posts); $i++)
                <article class="bg-post">
                    @unless (Auth::guest())
                        <a class="bg-post__editar o-button--tie o-button--medium" href="/painel/post/{{$posts[$i]->id}}"><i class="icon-pencil"></i>@lang("messages.botao.editar")</a>
                    @endunless
                    <a href="/{{$posts[$i]->slug}}"><div class="bg-post__imagem" style="background-image: url(/arquivo/download/posts/{{date_format(date_create($posts[$i]->datapostagem), "Y")}}/{{date_format(date_create($posts[$i]->datapostagem), "m")}}/{{$posts[$i]->imagem}});"></div></a>
                    <div class="bg-post__wrap">
                        <header class="bg-post__cabecalho">
                            <p class="bg-post__tags">
                                @foreach ($posts[$i]->tags as $tag)
                                    <a class="bg-post__tag" href="/tag/{{$tag->tag->slug}}">{{$tag->tag->descricao}}</a>
                                @endforeach
                            </p>
                            <h2 class="bg-post__titulo">
                                <a class="bg-post__link" href="/{{$posts[$i]->slug}}">{{$posts[$i]->titulo}}</a>
                            </h2>
                        </header>
                        <section class="bg-post__conteudo">{{$posts[$i]->conteudoresumido}}.</section>
                        <footer class="bg-post__rodape">
                            <p class="bg-post__informacoes">
                                <time class="bg-post__data">{{date_format(date_create($posts[$i]->datapostagem), $blog->parametros->formatodatahora->formato)}}</time> por <a class="bg-post__autor" href="/autor/{{$posts[$i]->autor->slug}}">{{$posts[$i]->autor->nome}}</a>
                            </p>
                            <p class="bg-post__categorias">
                                <span style="color: #BFBFBF;">- Em</span>
                                @foreach ($posts[$i]->categorias as $categoria)
                                    <a class="bg-post__categoria" href="/categoria/{{$categoria->categoria->slug}}">{{$categoria->categoria->descricao}}</a>
                                @endforeach
                            </p>
                        </footer>
                    </div>
                </article>
            @endfor
        </section>
        <aside class="bg-aside">
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
{{--
@include("temas.playpix.footer")--}}

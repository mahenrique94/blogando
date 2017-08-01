@extends("config.pagina")
@include("temas.blogando.header")
@section("conteudo")
    <section class="bg-conteudo u-content">
        @if (isset($mes) && !is_null($mes) && !empty($mes) && isset($ano) && !is_null($ano) && !empty($ano))
            <p class="bg-resultado">Foi encontrado <strong>{{count($posts)}}</strong> {{count($posts) > 1 ? "posts" : "post"}} para o mês <strong>{{$mes}}</strong> do ano <strong>{{$ano}}</strong>.</p>
        @endif
        @if (isset($autor) && !is_null($autor) && !empty($autor))
            <p class="bg-resultado">Foi encontrado <strong>{{count($posts)}}</strong> {{count($posts) > 1 ? "posts" : "post"}} para o autor <strong>{{$autor->nome}}</strong>.</p>
        @endif
        @if (isset($categoria) && !is_null($categoria) && !empty($categoria))
            <p class="bg-resultado">Foi encontrado <strong>{{count($posts)}}</strong> {{count($posts) > 1 ? "posts" : "post"}} para a categoria <strong>{{$categoria->descricao}}</strong>.</p>
        @endif
        @if (isset($tag) && !is_null($tag) && !empty($tag))
            <p class="bg-resultado">Foi encontrado <strong>{{count($posts)}}</strong> {{count($posts) > 1 ? "posts" : "post"}} para a tag <strong>{{$tag->descricao}}</strong>.</p>
        @endif
        <section class="bg-posts">
            @foreach ($posts as $post)
                <article class="bg-post">
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
        </section>
        <aside class="bg-aside">
            <div class="bg-aside__caixa">
                <h3 class="bg-aside__titulo">Redes Sociais</h3>
                {{--  <ul class="bg-aside__lista">
                    @foreach ($categorias as $categoria)                
                        <li class="bg-aside__item"><a class="bg-aside__link" href="/categoria/{{$categoria->slug}}">{{$categoria->descricao}}</a></li>
                    @endforeach
                </ul>  --}}
            </div>
            <div class="bg-aside__caixa">
                <h3 class="bg-aside__titulo">Postagens recentes</h3>
                <ul class="bg-aside__lista">
                    @foreach ($postsrecentes as $post)                
                        <li class="bg-aside__item"><a class="bg-aside__link" href="/{{$post->slug}}">{{$post->titulo}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="bg-aside__caixa">
                <h3 class="bg-aside__titulo">Categorias</h3>
                <ul class="bg-aside__lista">
                    @foreach ($categorias as $categoria)                
                        <li class="bg-aside__item"><a class="bg-aside__link" href="/categoria/{{$categoria->slug}}">{{$categoria->descricao}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="bg-aside__caixa">
                <h3 class="bg-aside__titulo">Tags</h3>
                @foreach ($tags as $tag)                
                    <a class="bg-post__tag" href="/tag/{{$tag->slug}}">{{$tag->descricao}}</a>
                @endforeach
            </div>
            <div class="bg-aside__caixa">
                <h3 class="bg-aside__titulo">Arquivos</h3>
                {{--  <ul class="bg-aside__lista">
                    @foreach ($tags as $tag)                
                        <li class="bg-aside__item"><a class="bg-aside__link" href="/tag/{{$tag->slug}}">{{$tag->descricao}}</a></li>
                    @endforeach
                </ul>  --}}
            </div>
        </aside>
    </section>
@stop
@include("temas.blogando.footer")
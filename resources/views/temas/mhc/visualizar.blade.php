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
                <header class="bg-container bg-post__cabecalho">
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
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <ins class="adsbygoogle"
                     style="display:block; text-align:center;"
                     data-ad-layout="in-article"
                     data-ad-format="fluid"
                     data-ad-client="ca-pub-5664132862898238"
                     data-ad-slot="1491366296"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
                <section class="bg-container bg-post__conteudo">{!!$post->conteudohtml!!}</section>
                <footer class="bg-container bg-post__rodape">
                    <p class="bg-post__tags">
                        @foreach ($post->tags as $tag)
                            <a class="bg-post__tag" href="/tag/{{$tag->tag->slug}}">{{$tag->tag->descricao}}</a>
                        @endforeach
                    </p>
                </footer>
            </article>
        </section>
        <div class="bg-container">
            @if ($blog->parametros->permitircompartilhamentos && ($blog->parametros->idtipocompartilhamento === 1 || $blog->parametros->idtipocompartilhamento === 3))
                @include("temas.blogando.compartilhamento-post")
            @endif
            <div class="bg-aside__caixa bg-aside__caixa--newsletter">
                <h3 class="bg-aside__titulo">Deseja receber novidades por email?</h3>
                <div class="bg-aside__corpo">
                    <p class="bg-aside__descricao">Assine a newsletter e receba por email novos posts publicados no blog.</p>
                    <form action="/newsletter/assinar" class="bg-newsletter o-form" method="post" onsubmit="assinarNewsletter(this, event);">
                        <section class="o-form__body">
                            <div class="l-row" role="row">
                                <div class="u-grid--12" role="grid">
                                    <div class="o-form__group">
                                        <input aria-required="true" class="bg-newsletter__data o-form__data no-margin" maxlength="255" name="email" placeholder="@lang("messages.placeholder.emailnewsletter")" required type="email">
                                        <span class="o-form__groupElement"><label class="bg-newsletter__botao o-button--tie"><i class="icon-mail"></i></label></span>
                                    </div>
                                </div>
                            </div>
                            <div class="l-row" role="row">
                                <div class="u-grid--12" role="grid">
                                    <button class="bg-aside__button o-button--tie o-button--medium is-right" role="button" title="@lang("messages.botao.assinar")" type="submit"><i class="icon-thumbs-up"></i>&nbsp;Eu quero receber</button>
                                </div>
                            </div>
                        </section>
                    </form>
                </div>
            </div>
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <ins class="adsbygoogle"
                 style="display:block; text-align:center;"
                 data-ad-layout="in-article"
                 data-ad-format="fluid"
                 data-ad-client="ca-pub-5664132862898238"
                 data-ad-slot="5354713398"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
            @include("temas.blogando.autor")
            @if ($blog->parametros->permitircomentarios && $blog->parametros->permitircomentariosanonimos)
                @include("temas.blogando.comentario")
            @endif
            @if ($blog->parametros->permitircomentarios && $blog->parametros->utilizarcomentariosdisqus)
                @include("temas.blogando.disqus")
            @endif
        </div>
    </section>
@stop
@include("temas.mhc.footer")
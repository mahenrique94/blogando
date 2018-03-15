<!doctype html>
<html lang="pt-br">
<head>
    @include("painel.config.libraries-style")
    <meta content="index, follow" name="robots">
    <meta charset="UTF-8">
    <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <meta content="unsafe-url" name="referrer">
    <meta content="{{$blog->keywords}}" name="keywords">
    <link href="/assets/lib/prism/prism.css" rel="stylesheet">
    @unless ($blog->aparencia->temablog === "blogando")
        <link href="/assets/temas/blogando/blogando.css" rel="stylesheet">
    @endunless
    <link href="/assets/temas/blogando/media-querie.css" rel="stylesheet">
    <link href="/assets/temas/{{$blog->aparencia->temablog}}/{{$blog->aparencia->temablog}}.css" rel="stylesheet">
    <link href="/assets/temas/{{$blog->aparencia->temablog}}/favicon.ico" rel="icon">
    @unless($pagina === "pre-visualizar")
        @includeIf("temas." . $blog->aparencia->temablog . ".google-console")
    @endunless
    <meta property="og:locale" content="pt_BR">
    <meta property=”og:site_name” content=”{{$blog->titulo}}“/>
    <meta content="summary_large_image" name="twitter:card"/>
    <meta content="{{$blog->url}}" property="article:publisher">
    <meta content="{{$blog->titulo}}" property="og:site_name">
    <meta content="143110269653288" property="fb:app_id">
    {{-- TODO => Verificar para pegar informações do banco de dados de cada blog --}}
    <meta content="@mahenrique94" name="twitter:site"/>
    <meta content="@mahenrique94" name="twitter:creator"/>
    <meta content="@mahenrique94" name="twitter:site"/>
    <meta name="theme-color" content="#0099FF">
    <link href="https://plus.google.com/116607343343494563581" rel="publisher">
    <link href="https://plus.google.com/116607343343494563581" rel="author">
    {{-- TODO --}}
    @if (isset($pagina) && ($pagina === "visualizar" || $pagina === "pre-visualizar"))
        <title>{{$blog->titulo}}&nbsp;|&nbsp;@yield("titulo")</title>
        <link href="{{$blog->url}}/{{$post->slug}}" rel="canonical">
        <meta content="{{$post->titulo}}" name="title">
        <meta content="{{$post->conteudoresumido}}" name="description">
        <meta content="{{$post->titulo}}" property="og:title"/>
        <meta content="{{$blog->url}}/{{$post->slug}}" property="og:url"/>
        <meta content="article" property="og:type"/>
        <meta content="{{$post->perfil->nome}}" property="article:author">
        <meta content="{{count($post->categorias) > 0 ? $post->categorias[0]->categoria->descricao : ""}}" property="article:section">
        <meta content="@foreach ($post->tags as $tag) {{$tag->tag->descricao}} @endforeach" property="article:tag">
        <meta content="{{$post->datapostagem}}" property="article:published_time">
        <meta content="{{$post->conteudoresumido}}" property="og:description"/>
        <meta content="{{$blog->url}}/arquivo/download/posts/{{date_format(date_create($post->datapostagem), "Y")}}/{{date_format(date_create($post->datapostagem), "m")}}/{{$post->imagem}}" property="og:image"/>
        <meta content="{{$post->titulo}}" name="twitter:title"/>
        <meta content="{{$post->conteudoresumido}}" name="twitter:description"/>
        <meta content="{{$blog->url}}/arquivo/download/posts/{{date_format(date_create($post->datapostagem), "Y")}}/{{date_format(date_create($post->datapostagem), "m")}}/{{$post->imagem}}" name="twitter:image"/>
        <meta content="{{$blog->url}}/arquivo/download/posts/{{date_format(date_create($post->datapostagem), "Y")}}/{{date_format(date_create($post->datapostagem), "m")}}/{{$post->imagem}}" name="twitter:image:src"/>
        <meta content="{{$post->titulo}}" name="twitter:image:alt"/>
        <meta itemscope itemtype="http://schema.org/Article"/>
        <meta content="{{$post->titulo}}" itemprop="headline"/>
        <meta content="{{$post->conteudoresumido}}" itemprop="description"/>
        <meta content="{{$blog->url}}/arquivo/download/posts/{{date_format(date_create($post->datapostagem), "Y")}}/{{date_format(date_create($post->datapostagem), "m")}}/{{$post->imagem}}" itemprop="image"/>
        <meta content="{{$post->titulo}}" itemprop="og:headline"/>
        <meta content="{{$post->conteudoresumido}}" itemprop="og:description"/>
        <meta content="{{$post->perfil->nome}}" property="author">
    @else
        <title>@yield("titulo")</title>
        <meta content="{{$blog->titulo}}" name="title">
        <link href="{{$blog->url}}" rel="canonical">
        <meta content="{{$blog->descricao}}" name="description">
        <meta content="{{$blog->titulo}}" property="og:title"/>
        <meta content="{{$blog->url}}" property="og:url"/>
        <meta content="blog" property="og:type"/>
        <meta content="{{$blog->descricao}}" property="og:description"/>
        <meta content="{{$blog->url}}/arquivo/download/blog/{{$blog->imagem}}" property="og:image"/>
        <meta content="{{$blog->titulo}}" name="twitter:title"/>
        <meta content="{{$blog->descricao}}" name="twitter:description"/>
        <meta content="{{$blog->url}}/arquivo/download/blog/{{$blog->imagem}}" name="twitter:image"/>
        <meta content="{{$blog->url}}/arquivo/download/blog/{{$blog->imagem}}" name="twitter:image:src"/>
        <meta content="{{$blog->titulo}}" name="twitter:image:alt"/>
        <meta itemscope itemtype="http://schema.org/Blog"/>
        <meta content="{{$blog->titulo}}" itemprop="headline"/>
        <meta content="{{$blog->descricao}}" itemprop="description"/>
        <meta content="{{$blog->url}}/arquivo/download/blog/{{$blog->imagem}}" itemprop="image"/>
        <meta content="{{$blog->titulo}}" itemprop="og:headline"/>
        <meta content="{{$blog->descricao}}" itemprop="og:description"/>
    @endif
</head>
<body class="bg-body" style="{{Auth::guest() || \App\TblPerfil::ehLeitor() ? "" : "padding-top: 50px;"}}">
    @if (!Auth::guest())
        @include("painel.config.aside")
    @endif
    <main class="bg-wrap u-wrap" role="main">
        @include("config.header")
        @yield("conteudo")
        @include("config.footer")
    </main>
    @include("painel.config.libraries-js")
    <script src="/assets/lib/prism/prism.js"></script>
    @unless ($blog->aparencia->temablog === "blogando")
        <script src="/assets/temas/blogando/blogando.js"></script>
    @endunless
    <script src="/assets/temas/{{$blog->aparencia->temablog}}/{{$blog->aparencia->temablog}}.js"></script>
    @unless($pagina === "pre-visualizar")
        @includeIf("temas." . $blog->aparencia->temablog . ".google-analytics")
        @includeIf("temas." . $blog->aparencia->temablog . ".google-adsense")
    @endunless
    @if (isset($pagina) && $pagina === "visualizar")
        @includeIf("temas." . $blog->aparencia->temablog . ".disqus-config")
    @endif
    @yield("rodape")
</body>
</html>
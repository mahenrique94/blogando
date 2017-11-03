<!doctype html>
<html lang="pt-br">
<head>
    @include("painel.config.libraries-style")
    <meta charset="UTF-8">
    <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <meta name="keywords" content="{{$blog->keywords}}">
    <title>@yield("titulo")</title>
    <link rel="stylesheet" href="/assets/lib/prism/prism.css">
    @unless ($blog->aparencia->temablog === "blogando")
        <link rel="stylesheet" href="/assets/temas/blogando/blogando.css">
    @endunless
    <link rel="stylesheet" href="/assets/temas/blogando/media-querie.css">
    <link rel="stylesheet" href="/assets/temas/{{$blog->aparencia->temablog}}/{{$blog->aparencia->temablog}}.css">
    <link rel="icon" href="/assets/temas/{{$blog->aparencia->temablog}}/favicon.ico">
    @include("temas." . $blog->aparencia->temablog . ".google-console")
    {{-- OPEN GRAPH -> FACEBOOK --}}
    <meta property="og:locale" content="pt_BR">
    <meta property=”og:site_name” content=”{{$blog->titulo}}“/>
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="400">
    @if (isset($pagina) && $pagina === "visualizar")
        <meta name="description" content="{{$post->conteudoresumido}}">
        <meta property="og:title" content="{{$post->titulo}}" />
        <meta property="og:url" content="{{$blog->url}}/{{$post->slug}}" />
        <meta property="og:type" content="article"/>
        <meta property="article:author" content="{{$post->autor->nome}}">
        <meta property="article:section" content="{{$post->categorias[0]->categoria->descricao}}">
        <meta property="article:tag" content="@foreach ($post->tags as $tag) {{$tag->tag->descricao}} @endforeach">
        <meta property="article:published_time" content="{{$post->datapostagem}}">
        <meta property="og:description" content="{{$post->conteudoresumido}}" />
        <meta property="og:image" content="{{$blog->url}}/arquivo/download/posts/{{date_format(date_create($post->datapostagem), "Y")}}/{{date_format(date_create($post->datapostagem), "m")}}/{{$post->imagem}}"/>
    @else
        <meta name="description" content="{{$blog->descricao}}">
        <meta property="og:title" content="{{$blog->titulo}}" />
        <meta property="og:url" content="{{$blog->url}}" />
        <meta property="og:type" content="blog"/>
        <meta property="og:description" content="{{$blog->descricao}}" />
        <meta property="og:image" content="{{$blog->url}}/arquivo/download/blog/{{$blog->imagem}}"/>
    @endif
    {{-- //OPEN GRAPH -> FACEBOOK --}}
</head>
<body class="bg-body" style="{{Auth::guest() ? "" : "padding-top: 50px;"}}">
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
    @include("temas." . $blog->aparencia->temablog . ".google-analytics")
    @yield("rodape")
</body>
</html>
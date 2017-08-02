<!doctype html>
<html lang="en">
<head>
    @include("painel.config.libraries-style")
    <meta charset="UTF-8">
    <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <title>@yield("titulo")</title>
    <link rel="stylesheet" href="/assets/lib/prism/prism.css">
    <link rel="stylesheet" href="/assets/temas/{{$blog->aparencia->temablog}}/{{$blog->aparencia->temablog}}.css">
    <link rel="icon" href="/assets/temas/{{$blog->aparencia->temablog}}/favicon.ico">
</head>
<body class="bg-body" style="padding-top: {{Auth::guest() ? "" : "50px"}};">
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
    <script src="/assets/temas/{{$blog->aparencia->temablog}}/{{$blog->aparencia->temablog}}.js"></script>
</body>
</html>
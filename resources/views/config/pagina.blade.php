<!doctype html>
<html lang="en">
<head>
    @include("painel.config.libraries-style")
    <meta charset="UTF-8">
    <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <title>{{$blog->titulo}}</title>
    <link rel="icon" href="/assets/painel/img/favicon.ico">
</head>
<body class="bg-body">
    <main class="bg-wrap u-wrap" role="main">
        @include("config.header")
        <section class="bg-conteudo u-content">
            @yield("conteudo")
        </section>
        @include("config.footer")
    </main>
</body>
</html>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <title>@yield("titulo")</title>
</head>
<body style="background: #DCDCDC;font-family: Arial, sans-serif;margin: 0;padding: 0;">
    <div style="background: #FDFDFD;margin-bottom: 3rem;">
        <h1 style="border-bottom: 3px solid #0099FF;color: #0099FF;margin: 0;padding: 1rem 3rem;">{{ $blog->titulo  }}</h1>
    </div>
    <div style="background: #FDFDFD;border: 1px solid #DCDCDC;box-shadow: 2px 1px 5px rgba(0, 0, 0, .25);padding: 2rem;margin: 0 auto 3rem;width: 60%;">
        @yield("conteudo")
    </div>
</body>
</html>
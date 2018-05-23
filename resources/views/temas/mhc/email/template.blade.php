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
        <h1 style="border-bottom: 3px solid #0099FF;margin: 0;padding: 1rem 3rem;"><a href="{{ $blog->url }}" style="color: #0099FF;text-decoration: none;" target="_blank">{{ $blog->titulo  }}</a></h1>
    </div>
    <div style="background: #FDFDFD;border: 1px solid #DCDCDC;box-shadow: 2px 1px 5px rgba(0, 0, 0, .25);padding: 2rem;margin: 0 auto;width: 60%;">
        @yield("conteudo")
    </div>
    <div style="color: #333333;font-size: .75rem;margin: 0 auto 3rem;padding: 0;width: 60%;"><p>Obrigado por faze parte de nossa <em>newsletter</em>, caso você não tenha mais interesse em receber nossos <em>emails</em>, por favor me envie um email pedindo seu cancelamento, obrigado.</p></div>
</body>
</html>
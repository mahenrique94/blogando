<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <title>Email</title>
</head>
<body style="font-family: Arial, sans-serif;margin: 0;padding: 0;">
    <main>
        <header style="background: #820CAF;color: #FDFDFD;font-size: 1.5rem;padding: 2rem;text-transform: uppercase;">
            {{$nome}} entrou em contato com você
        </header>
        <section style="background: #F2F2F2;padding: 1rem 2rem;">
            <h1 style="color: #820CAF;">Contato enviado a partir do site Playpix</h1>
            <p style="color: #595959;">Ola Playpix, </p>
            <p style="color: #595959;">{{$nome }}entrou em contato com você, vamos tentar respondê-lo o mais rápido possível, pois ele esta nos aguardando, segue abaixo os dados do contato:</p>
            <div style="background: #FFFFFF;padding: 1rem;">
                <p style="color: #595959;font-weight: 100;">
                    <label style="color: #820CAF;font-size: 1.2rem;font-weight: bold;">Nome:&nbsp;</label>{{$nome}}
                </p>
                <p style="color: #595959;font-weight: 100;">
                    <label style="color: #820CAF;font-size: 1.2rem;font-weight: bold;">Email:&nbsp;</label>{{$email}}
                </p>
                <p style="color: #595959;font-weight: 100;">
                    <label style="color: #820CAF;font-size: 1.2rem;font-weight: bold;">Telefone:&nbsp;</label>{{$telefone}}
                </p>
                <p style="color: #595959;font-weight: 100;">
                    <label style="color: #820CAF;font-size: 1.2rem;font-weight: bold;">Celular:&nbsp;</label>{{$celular}}
                </p>
                <p style="color: #595959;font-weight: 100;">
                    <label style="color: #820CAF;font-size: 1.2rem;font-weight: bold;">Assunto:&nbsp;</label>{{$assunto}}
                </p>
                <p style="color: #595959;font-weight: 100;">
                    <label style="color: #820CAF;font-size: 1.2rem;font-weight: bold;">Mensagem:&nbsp;</label><br/>
                    <span style="display: block;padding: 1rem;">{{$mensagem}}</span>
                </p>
            </div>
            <p style="color: #595959;">Contato realizado em {{date("d/m/Y H:i")}}</p>
        </section>
        <footer style="background: #820CAF;padding: .5rem 2rem;">
            <a href="https://www.playpix.com.br" style="color: #E1F5FC;font-weight: 100;text-decoration: none;" target="_blank">Playpix - &copy;Copyright 2017</a>
        </footer>
    </main>
</body>
</html>
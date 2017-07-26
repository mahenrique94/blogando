<!doctype html>
<html lang="en">
<head>
    @include("painel.config.libraries-style")
    <meta charset="UTF-8">
    <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <title>@lang("messages.titulo.pagina")&nbsp;|&nbsp;Controle de Acesso</title>
    <link rel="icon" href="/assets/img/favicon.ico">
</head>
<body class="bg-p-body bg-p-autenticacao">
    @include("painel.config.mensagens")
    <main class="bg-p-wrap u-wrap" role="main">
        <section class="bg-p-conteudo u-content">
            <fieldset class="bg-p-autenticacao__painel">
                <legend class="bg-p-autenticacao__titulo">Controle de Acesso</legend>
                <form action="/painel/autenticar" class="o-form bg-p-autenticacao__formulario" method="post">
                    <div class="l-row" role="row">
                        <div class="u-grid--12" role="grid">
                            <div class="bg-p-autenticacao__grupo">
                                <i class="icon-user bg-p-autenticacao__icone"></i>
                                <input aria-required="true" autofocus class="o-form__data bg-p-autenticacao__data" id="email" maxlength="255" name="email" placeholder="@lang("messages.placeholder.email")" required type="email">
                            </div>
                        </div>
                    </div>
                    <div class="l-row" role="row">
                        <div class="u-grid--12" role="grid">
                            <div class="bg-p-autenticacao__grupo">
                                <i class="icon-lock bg-p-autenticacao__icone"></i>
                                <input aria-required="true" class="o-form__data bg-p-autenticacao__data" id="senha" maxlength="255" name="senha" placeholder="@lang("messages.placeholder.senha")" required type="password">
                            </div>
                        </div>
                    </div>
                    <div class="l-row" role="row">
                        <div class="u-grid--12 no-margin" role="grid">
                            <button class="bg-p-autenticacao__botao" role="button" title="@lang("messages.botao.acessar")" type="submit">@lang("messages.botao.acessar")</button>
                        </div>
                    </div>
                </form>
                <div class="bg-p-autenticacao__marca">
                    &copy;@lang("messages.titulo.pagina") Todos os direitos reservados
                </div>
            </fieldset>
        </section>
    </main>
    @include("painel.config.libraries-js")
</body>
</html>
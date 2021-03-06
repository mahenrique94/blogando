<!doctype html>
<html lang="en">
<head>
    @include("painel.config.libraries-style")
    <meta charset="UTF-8">
    <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <title>@lang("messages.titulo.pagina")&nbsp;|&nbsp;Controle de Acesso</title>
    <link rel="icon" href="/assets/painel/img/favicon.ico">
</head>
<body class="bg-p-body bg-p-autenticacao">
    @include("painel.config.mensagens")
    <main class="bg-p-wrap u-wrap" role="main">
        <section class="bg-p-conteudo u-content">
            <fieldset class="bg-p-autenticacao__painel">
                <div class="bg-p-autenticacao__logo">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 400" style="enable-background:new 0 0 500 400;" xml:space="preserve">
                        <style type="text/css">
                            .st0{fill:none;stroke:#333333;stroke-width:10;stroke-miterlimit:10;}
                            .st1{fill:#333333;}
                        </style>
                        <circle class="st0" cx="248.2" cy="194.5" r="185"/>
                        <path class="st1" d="M347.6,212.9c-7.7-12.3-19.5-22.6-35.3-30.7l-44.2-14.1v40.5c2.4,0.6,4.9,1.2,7.3,1.8c9,2.5,17.3,6.3,24.9,11.6 c6.2,3.9,10.8,8.9,13.8,14.8c3,5.9,4.4,12.2,4.4,18.7c0,12.5-4.2,22.2-12.6,29.1s-18.2,11.9-29.6,15c-11.3,3.1-22.9,5-34.8,5.7 c-11.8,0.7-21.2,1-28.1,1v-98.6c0.2,0,0.4,0,0.6,0v-43.9c-0.2,0-0.4,0-0.6,0V83c6.5-2.6,13.4-4.4,20.5-5.4V37.1 c-4.2,0.6-8.6,1.5-13.4,2.5c-12,2.6-23.6,6.3-34.8,11.1c-4.5,1.9-8.8,4-12.8,6.2V134h0v183.2c-1.3,3.3-2,6.1-2,8.4 c0,4.6,1.7,9,5.2,13.1c3.5,4.1,8.8,6.5,16,7.1c4.6,0.3,9.1,0.5,13.6,0.5c4.4,0,9,0,13.6,0c12.5,0,25.1-0.6,37.7-1.7 c12.7-1.2,25.1-3.7,37.2-7.6c9.5-3,18.2-7.3,26.1-13.1c7.9-5.7,14.7-12.4,20.5-20c5.7-7.6,10.3-15.7,13.6-24.4 c3.3-8.7,4.9-17.7,4.9-26.9C359.4,238.8,355.5,225.6,347.6,212.9z"/>
                        <small class="bg-p-autenticacao__nome">@lang("messages.titulo.pagina")</small>
                    </svg>
                </div>
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
                        <div class="u-grid--12" role="grid">
                            <button class="bg-p-autenticacao__botao" role="button" title="@lang("messages.botao.acessar")" type="submit">@lang("messages.botao.acessar")</button>
                        </div>
                    </div>
                    <div class="l-row" role="row">
                        <div class="u-grid--12 no-margin" role="separator">
                            <input class="o-mark__data--checkbox" id="relembrar" name="relembrar" type="hidden" value="false">
                            <label class="o-mark__text"><span class="o-mark__element" data-marked="true" data-unmarked="false" onclick="MarkController.mark(this);"></span>@lang("messages.label.lembraracesso")</label>
                        </div>
                    </div>
                </form>
                <div class="bg-p-autenticacao__marca">
                    &copy;@lang("messages.titulo.pagina")&nbsp;@lang("messages.label.direitosreservados")
                </div>
            </fieldset>
        </section>
    </main>
    @include("painel.config.libraries-js")
</body>
</html>
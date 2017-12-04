@extends("config.pagina")
@section("titulo") Fale conosco @stop
@include("temas.playpix.header")
@section("conteudo")
    <section class="u-content">
        <div class="bg-info">A <a class="bg-marca" href="/"><strong>Playpix</strong></a> é um canal de notícias atualizado diariamente</div>
        <section class="bg-pagina">
            <h2 class="bg-pagina__titulo">Crie sua conta</h2>
            <p class="bg-pagina__descricao">Criando sua conta você tem acesso ao nosso painel e diversas funcionaldades que apenas leitores credenciados possuem acesso, entre eles destacamos: Favoritar ou curtir notícias, realizar comentários, receber informações via email, entre outros.</p>
            <form action="/painel/criar/conta" autocomplete="off" class="bg-contato" method="post">
                <input aria-hidden="true" name="view" type="hidden" value="temas.playpix.template">
                <sectiom class="bg-contato__corpo">
                    @if(!empty(old("mensagem")))
                        <div style="background: #CCFFCC;border-left: 5px solid #00CC99;color: #00CC99;margin-bottom: 1rem;padding: 1rem;">{{old("mensagem")}}</div>
                    @endif
                        <div class="l-row" role="row">
                            <div class="u-grid--mobile12 u-grid--tablet12 u-grid--desktop12 u-grid--screen12" role="grid">
                                <label for="nome" class="bg-contato__label">@lang("messages.label.nome")<span class="bg-contato__obrigatorio">@lang("messages.label.obrigatorio")</span></label>
                                <div class="o-form__iconed">
                                    <input aria-required="true" class="bg-contato__dados" id="nome" maxlength="120" name="nome" required type="text">
                                    <i class="o-form__icon bg-contato__icone icon-user"></i>
                                </div>
                            </div>
                        </div>
                        <div class="l-row" role="row">
                            <div class="u-grid--mobile12 u-grid--tablet12 u-grid--desktop12 u-grid--screen12" role="grid">
                                <label for="nome" class="bg-contato__label">@lang("messages.label.apelido")</label>
                                <div class="o-form__iconed">
                                    <input class="bg-contato__dados" id="apelido" maxlength="60" name="apelido" type="text">
                                    <i class="o-form__icon bg-contato__icone icon-certificate"></i>
                                </div>
                            </div>
                        </div>
                        <div class="l-row" role="row">
                            <div class="u-grid--mobile12 u-grid--tablet12 u-grid--desktop12 u-grid--screen12" role="grid">
                                <label for="email" class="bg-contato__label">@lang("messages.label.email")<span class="bg-contato__obrigatorio">@lang("messages.label.obrigatorio")</span></label>
                                <div class="o-form__iconed">
                                    <input aria-required="true" class="bg-contato__dados" id="email" maxlength="255" name="email" required type="email">
                                    <i class="o-form__icon bg-contato__icone icon-mail"></i>
                                </div>
                            </div>
                        </div>
                        <div class="l-row" role="row">
                            <div class="u-grid--mobile12 u-grid--tablet12 u-grid--desktop12 u-grid--screen12" role="grid">
                                <label for="email" class="bg-contato__label">@lang("messages.label.senha")<span class="bg-contato__obrigatorio">@lang("messages.label.obrigatorio")</span></label>
                                <div class="o-form__iconed">
                                    <input aria-required="true" class="bg-contato__dados" id="senha" maxlength="255" name="senha" required type="password">
                                    <i class="o-form__icon bg-contato__icone icon-lock"></i>
                                </div>
                            </div>
                        </div>
                        <div class="l-row" role="row">
                            <div class="u-grid--mobile12 u-grid--tablet12 u-grid--desktop12 u-grid--screen12" role="grid">
                                <label for="mensagem" class="bg-contato__label">@lang("messages.label.perfil")<span class="bg-contato__obrigatorio"></label>
                                <textarea class="bg-contato__dados" id="perfil" name="descricao" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="l-row" role="row">
                            <div class="u-grid--mobile12 u-grid--tablet12 u-grid--desktop12 u-grid--screen12" role="grid">
                                <button class="bg-contato__botao" role="button" title="@lang("messages.botao.criarconta")" type="submit"><i class="icon-thumbs-up"></i>&nbsp;@lang("messages.botao.criarconta")</button>
                            </div>
                        </div>
                </sectiom>
            </form>
        </section>
    </section>
@stop
@include("temas.playpix.footer")
@include("temas.playpix.rodape")
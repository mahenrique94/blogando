@extends("config.pagina")
@section("titulo") Fale conosco @stop
@include("temas.playpix.header")
@section("conteudo")
    <section class="u-content">
        <div class="bg-info">A <a class="bg-marca" href="/"><strong>Playpix</strong></a> é um canal de notícias atualizado diariamente</div>
        <section class="bg-pagina">
            <h2 class="bg-pagina__titulo">Fale conosco?</h2>
            <p class="bg-pagina__descricao">A Playpix tem por missão transmitir informações atualizadas do mundo do entretenimento (Games, filmes, animes, tecnologia). O nosso objetivo é levar notícia objetivas e com qualidade até você. Aqui você também pode se manifestar dando sua sugestão, crítica ou elogio. Entre em contato conosco, preencha o formulário abaixo e envie sua mensagem. Responderemos o mais breve possível.</p>
            <form action="/email/enviar" autocomplete="off" class="bg-contato" method="get">
                <input aria-hidden="true" name="view" type="hidden" value="temas.playpix.template">
                <sectiom class="bg-contato__corpo">
                    @if(!empty(old("mensagem")))
                        <div style="background: #CCFFCC;border-left: 5px solid #00CC99;color: #00CC99;margin-bottom: 1rem;padding: 1rem;">{{old("mensagem")}}</div>
                    @endif
                    <div class="l-row" role="row">
                        <div class="u-grid--mobile12 u-grid--tablet12 u-grid--desktop12 u-grid--screen12" role="grid">
                            <label for="nome" class="bg-contato__label">@lang("messages.label.nome")<span class="bg-contato__obrigatorio">@lang("messages.label.obrigatorio")</span></label>
                            <div class="o-form__iconed">
                                <input aria-required="true" class="bg-contato__dados" id="nome" name="nome" required type="text">
                                <i class="o-form__icon bg-contato__icone icon-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="l-row" role="row">
                        <div class="u-grid--mobile12 u-grid--tablet12 u-grid--desktop12 u-grid--screen12" role="grid">
                            <label for="email" class="bg-contato__label">@lang("messages.label.email")<span class="bg-contato__obrigatorio">@lang("messages.label.obrigatorio")</span></label>
                            <div class="o-form__iconed">
                                <input aria-required="true" class="bg-contato__dados" id="email" name="email" placeholder="exemplo@exemplo.com" required type="email">
                                <i class="o-form__icon bg-contato__icone icon-mail"></i>
                            </div>
                        </div>
                    </div>
                    <div class="l-row" role="row">
                        <div class="u-grid--mobile12 u-grid--tablet12 u-grid--desktop6 u-grid--screen6" role="grid">
                            <label for="telefone" class="bg-contato__label">@lang("messages.label.telefone") com DDD</label>
                            <div class="o-form__iconed">
                                <input class="bg-contato__dados" id="telefone" name="telefone" placeholder="Apenas números" step="1" type="number">
                                <i class="o-form__icon bg-contato__icone icon-phone"></i>
                            </div>
                        </div><div class="u-grid--mobile12 u-grid--tablet12 u-grid--desktop6 u-grid--screen6" role="grid">
                            <label for="celular" class="bg-contato__label">@lang("messages.label.celular") com DDD</label>
                            <div class="o-form__iconed">
                                <input class="bg-contato__dados" id="celular" name="celular" placeholder="Apenas números" step="1" type="number">
                                <i class="o-form__icon bg-contato__icone icon-mobile"></i>
                            </div>
                        </div>
                    </div>
                    <div class="l-row" role="row">
                        <div class="u-grid--mobile12 u-grid--tablet12 u-grid--desktop12 u-grid--screen12" role="grid">
                            <label for="assunto" class="bg-contato__label">@lang("messages.label.assunto")<span class="bg-contato__obrigatorio">@lang("messages.label.obrigatorio")</span></label>
                            <div class="o-form__iconed">
                                <input aria-required="true" class="bg-contato__dados" id="assunto" name="assunto" required type="text">
                                <i class="o-form__icon bg-contato__icone icon-info-circled"></i>
                            </div>
                        </div>
                    </div>
                    <div class="l-row" role="row">
                        <div class="u-grid--mobile12 u-grid--tablet12 u-grid--desktop12 u-grid--screen12" role="grid">
                            <label for="mensagem" class="bg-contato__label">@lang("messages.label.mensagem")<span class="bg-contato__obrigatorio">@lang("messages.label.obrigatorio")</span></label>
                            <textarea aria-required="true" class="bg-contato__dados" id="mensagem" name="mensagem" required rows="10" style="padding: .75rem;"></textarea>
                        </div>
                    </div>
                    <div class="l-row" role="row">
                        <div class="u-grid--mobile12 u-grid--tablet12 u-grid--desktop12 u-grid--screen12" role="grid">
                            <button class="bg-contato__botao" role="button" title="@lang("messages.botao.enviar")" type="submit"><i class="icon-forward"></i>&nbsp;@lang("messages.botao.enviar")</button>
                        </div>
                    </div>
                </sectiom>
            </form>
        </section>
    </section>
@stop
@include("temas.playpix.footer")
@include("temas.playpix.rodape")
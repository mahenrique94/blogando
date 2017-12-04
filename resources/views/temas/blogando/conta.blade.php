@extends("config.pagina")
@section("titulo")@lang("messages.titulo.novaconta") @stop
@include("painel.config.mensagens")
@include("temas.blogando.header")
@section("conteudo")
    <section class="bg-conteudo u-content">
        <form action="/painel/criar/conta" class="bg-conta o-form" enctype="multipart/form-data" id="formnovaconta" method="POST" name="formnovaconta" role="form">
            <input aria-hidden="true" name="_token" type="hidden" value="{{csrf_token()}}"/>
            <h1 class="bg-conta__titulo">@lang("messages.titulo.novaconta")</h1>
            <section class="o-form__body o-form__body--padding">
                <div class="l-row" role="row">
                    <div class="u-grid--mobile12 u-grid--tablet12 u-grid--desktop9 u-grid--screen9" role="grid">
                        <label class="o-form__text" for="nome">@lang("messages.label.nome")</label>
                        <input aria-required="true" class="o-form__data" id="nome" maxlength="120" name="nome" required type="text">
                    </div>
                    <div class="u-grid--mobile12 u-grid--tablet12 u-grid--desktop3 u-grid--screen3" role="grid">
                        <label class="o-form__text" for="apelido">@lang("messages.label.apelido")</label>
                        <input class="o-form__data" id="apelido" maxlength="60" name="apelido" type="text">
                    </div>
                </div>
                <div class="l-row" role="row">
                    <div class="u-grid--mobile12 u-grid--tablet12 u-grid--desktop6 u-grid--screen6" role="grid">
                        <label class="o-form__text" for="email">@lang("messages.label.email")</label>
                        <input aria-required="true" class="o-form__data" id="email" maxlength="255" name="email" required type="email">
                    </div>
                    <div class="u-grid--mobile12 u-grid--tablet12 u-grid--desktop6 u-grid--screen6" role="grid">
                        <label class="o-form__text" for="senha">@lang("messages.label.senha")</label>
                        <input aria-required="true" class="o-form__data" id="senha" maxlength="255" name="senha" required type="password">
                    </div>
                </div>
                <div class="l-row" role="row">
                    <div class="u-grid--mobile12 u-grid--tablet12 u-grid--desktop12 u-grid--screen12" role="grid">
                        <label class="o-form__text" for="perfil">@lang("messages.label.perfil")</label>
                        <textarea class="o-form__data" id="perfil" name="descricao"></textarea>
                    </div>
                </div>
                <div class="l-row" role="row">
                    <div class="u-grid--mobile12 u-grid--tablet12 u-grid--desktop12 u-grid--screen12" role="grid">
                        <button class="o-button--kal o-button--large is-right" role="button" title="@lang("messages.botao.criarconta")" type="submit">@lang("messages.botao.criarconta")</button>
                    </div>
                </div>
            </section>
        </form>
    </section>
@stop
@include("temas.blogando.footer")
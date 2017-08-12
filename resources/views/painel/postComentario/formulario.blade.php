@extends("painel.config.pagina")
@section("pagina", "Comentários - Formulário")
@section("conteudo")
    <form action="/painel/comentario" class="o-form" id="formpostcomentario" method="POST" name="formpostcomentario" role="form">
        @if ($comentario->id != null)
            {{method_field("PUT")}}
        @endif
        <input aria-hidden="true" name="_token" type="hidden" value="{{csrf_token()}}"/>
        <input aria-hidden="true" name="id" type="hidden" value="{{$comentario->id}}"/>
        <div class="bg-p-dashboard__header">
            <div class="o-breadcrumb--arrow">
                <span class="o-breadcrumb__link"><a href="/painel/comentario" role="link" title="@lang("messages.menu.comentarios")">@lang("messages.menu.comentarios")</a></span>
                <span class="o-breadcrumb__link"><a class="is-inactive" href="/painel/comentario/formulario" role="link" title="@lang("messages.menu.formulario")">@lang("messages.menu.formulario")</a></span>
            </div>
            <button class="o-button--tie o-button--medium" type="submit"><i class="icon-floppy"></i>@lang("messages.botao.salvar")</button>
            <a class="o-button--tie o-button--medium" href="/painel/comentario"><i class="icon-search"></i>@lang("messages.botao.pesquisar")</a>
        </div>
        <section class="o-form__body o-form__body--padding">
            <div class="l-row" role="row">
                <div class="u-grid--6" role="grid">
                    <label class="o-form__text" for="nome">@lang("messages.label.nome")</label>
                    <input aria-readonly="true" aria-required="true" class="o-form__data" id="nome" maxlength="120" name="nome" readonly required type="text" value="{{$comentario->nome}}">
                </div>
                <div class="u-grid--6" role="grid">
                    <label class="o-form__text" for="email">@lang("messages.label.email")</label>
                    <input aria-readonly="true" aria-required="true" class="o-form__data" id="email" maxlength="120" name="email" readonly required type="email" value="{{$comentario->email}}">
                </div>
            </div>
            <div class="l-row" role="row">
                <div class="u-grid--12" role="grid">
                    <label class="o-form__text" for="comentario">@lang("messages.label.comentario")</label>
                    <textarea aria-required="true" class="o-form__data" id="comentario" name="comentario" required>{{$comentario->comentario}}</textarea>
                </div>
            </div>
            <div class="l-row" role="row">
                <div class="u-grid--12" role="grid">
                    <label class="o-form__text" for="aprovado">@lang("messages.label.aprovado")</label>
                    <input {{$comentario->aprovado ? "checked" : ""}} class="o-mark__data--checkbox" id="aprovado" name="aprovado" type="hidden" value="{{$comentario->aprovado}}">
                    <label class="o-mark__text"><span class="o-mark__element" data-marked="1" data-unmarked="0" onclick="MarkController.mark(this);"></span></label>
                </div>
            </div>
        </section>
    </form>
@stop
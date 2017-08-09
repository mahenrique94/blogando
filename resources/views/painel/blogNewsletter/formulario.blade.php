@extends("painel.config.pagina")
@section("pagina", "Newsletter - Formulário")
@section("conteudo")
    <form action="/painel/newsletter" class="o-form" id="formblognewsletter" method="POST" name="formblognewsletter" role="form">
        @if ($newsletter->id != null)
            {{method_field("PUT")}}
        @endif
        <input aria-hidden="true" name="_token" type="hidden" value="{{csrf_token()}}"/>
        <input aria-hidden="true" name="id" type="hidden" value="{{$newsletter->id}}"/>
        <div class="bg-p-dashboard__header">
            <div class="o-breadcrumb--arrow">
                <span class="o-breadcrumb__link"><a href="/painel/newsletter" role="link" title="@lang("messages.menu.newsletter")">@lang("messages.menu.newsletter")</a></span>
                <span class="o-breadcrumb__link"><a class="is-inactive" href="/painel/newsletter/formulario" role="link" title="@lang("messages.menu.formulario")">@lang("messages.menu.formulario")</a></span>
            </div>
            <button class="o-button--tie o-button--medium" type="submit"><i class="icon-floppy"></i>@lang("messages.botao.salvar")</button>
            <a class="o-button--tie o-button--medium" href="/painel/newsletter"><i class="icon-search"></i>@lang("messages.botao.pesquisar")</a>
        </div>
        <section class="o-form__body o-form__body--padding">
            <div class="l-row" role="row">
                <div class="u-grid--6" role="grid">
                    <label class="o-form__text" for="nome">@lang("messages.label.nome")</label>
                    <input {{$newsletter->id != null ? "" : "autofocus"}} aria-required="true" class="o-form__data" id="nome" maxlength="120" name="nome" type="text" value="{{$newsletter->nome}}">
                </div>
                <div class="u-grid--6" role="grid">
                    <label class="o-form__text" for="email">@lang("messages.label.email")</label>
                    <input aria-required="true" class="o-form__data" id="email" maxlength="255" name="email" required type="email" value="{{$newsletter->email}}">
                </div>
            </div>
            <div class="l-row" role="row">
                <div class="u-grid--4" role="grid">
                    <label class="o-form__text" for="acompanharposts">@lang("messages.label.acompanharposts")</label>
                    <input {{$newsletter->acompanharposts ? "checked" : ""}} class="o-mark__data--checkbox" id="acompanharposts" name="acompanharposts" type="hidden" value="{{!is_null($newsletter->id) ? $newsletter->acompanharposts : 0}}">
                    <label class="o-mark__text"><span class="o-mark__element" data-marked="1" data-unmarked="0" onclick="MarkController.mark(this);"></span></label>
                </div>
                <div class="u-grid--4" role="grid">
                    <label class="o-form__text" for="acompanharcomentarios">@lang("messages.label.acompanharcomentarios")</label>
                    <input {{$newsletter->acompanharcomentarios ? "checked" : ""}} class="o-mark__data--checkbox" id="acompanharcomentarios" name="acompanharcomentarios" type="hidden" value="{{!is_null($newsletter->id) ? $newsletter->acompanharcomentarios : 0}}">
                    <label class="o-mark__text"><span class="o-mark__element" data-marked="1" data-unmarked="0" onclick="MarkController.mark(this);"></span></label>
                </div>
                <div class="u-grid--4" role="grid">
                    <label class="o-form__text" for="acompanharrespostas">@lang("messages.label.acompanharrespostas")</label>
                    <input {{$newsletter->acompanharrespostas ? "checked" : ""}} class="o-mark__data--checkbox" id="acompanharrespostas" name="acompanharrespostas" type="hidden" value="{{!is_null($newsletter->id) ? $newsletter->acompanharrespostas : 0}}">
                    <label class="o-mark__text"><span class="o-mark__element" data-marked="1" data-unmarked="0" onclick="MarkController.mark(this);"></span></label>
                </div>
            </div>
            <div class="l-row" role="row">
                <div class="u-grid--12" role="grid">
                    <label class="o-form__text" for="inativo">@lang("messages.label.inativo")</label>
                    <input {{$newsletter->inativo ? "checked" : ""}} class="o-mark__data--checkbox" id="inativo" name="inativo" type="hidden" value="{{!is_null($newsletter->id) ? $newsletter->inativo : 0}}">
                    <label class="o-mark__text"><span class="o-mark__element" data-marked="1" data-unmarked="0" onclick="MarkController.mark(this);"></span></label>
                </div>
            </div>
        </section>
    </form>
@stop
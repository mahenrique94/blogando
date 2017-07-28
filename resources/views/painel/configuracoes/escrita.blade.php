@extends("painel.config.pagina")
@section("pagina", "Configurações - Escrita")
@section("conteudo")
    <form action="/painel/configuracoes/escrita" class="o-form" id="formblogparametros" method="POST" name="formblogparametros" role="form">
        {{method_field("PUT")}}
        <input aria-hidden="true" name="_token" type="hidden" value="{{csrf_token()}}"/>
        <input aria-hidden="true" name="id" type="hidden" value="{{$parametros->id}}"/> 
        <div class="bg-p-dashboard__header">
            <div class="o-breadcrumb--arrow">
                <span class="o-breadcrumb__link"><a href="/painel/configuracoes/geral" role="link" title="@lang("messages.menu.configuracoes")">@lang("messages.menu.configuracoes")</a></span>
                <span class="o-breadcrumb__link"><a class="is-inactive" href="/painel/configuracoes/escrita" role="link" title="@lang("messages.menu.configuracoes.escrita")">@lang("messages.menu.configuracoes.escrita")</a></span>
            </div>
        </div>
        <section class="o-form__body o-form__body--padding">
            <div class="l-row" role="row">
                <div class="u-grid--12" role="grid">
                    <label class="o-form__text" for="usarmarkdown">@lang("messages.label.usarmarkdown")</label>
                    <input {{$parametros->usarmarkdown ? "checked" : ""}} class="o-mark__data--checkbox" id="usarmarkdown" name="usarmarkdown" type="hidden" value="{{$parametros->usarmarkdown}}">
					<label class="o-mark__text"><span class="o-mark__element" data-marked="1" data-unmarked="0" onclick="MarkController.mark(this);"></span></label>
                </div>
            </div> 
            <div class="l-row is-right" role="row">
                <div class="u-grid--12" role="grid">
                    <button class="o-button--tie o-button--medium" type="submit"><i class="icon-arrows-cw"></i>@lang("messages.botao.atualizarconfiguracoes")</button>
                </div>
            </div> 
        </section> 
    </form>
@stop
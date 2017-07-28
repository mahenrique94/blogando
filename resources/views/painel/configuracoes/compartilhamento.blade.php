@extends("painel.config.pagina")
@section("pagina", "Configurações - Compartilhamento")
@section("conteudo")
    <form action="/painel/configuracoes/compartilhamento" class="o-form" id="formblogparametros" method="POST" name="formblogparametros" role="form">
        {{method_field("PUT")}}
        <input aria-hidden="true" name="_token" type="hidden" value="{{csrf_token()}}"/>
        <input aria-hidden="true" name="id" type="hidden" value="{{$parametros->id}}"/> 
        <div class="bg-p-dashboard__header">
            <div class="o-breadcrumb--arrow">
                <span class="o-breadcrumb__link"><a href="/painel/configuracoes/geral" role="link" title="@lang("messages.menu.configuracoes")">@lang("messages.menu.configuracoes")</a></span>
                <span class="o-breadcrumb__link"><a class="is-inactive" href="/painel/configuracoes/compartilhamento" role="link" title="@lang("messages.menu.configuracoes.compartilhamento")">@lang("messages.menu.configuracoes.compartilhamento")</a></span>
            </div>
        </div>
        <section class="o-form__body o-form__body--padding">
            <div class="l-row" role="row">
                <div class="u-grid--4" role="grid">
                    <label class="o-form__text" for="idtipocompartilhamento">@lang("messages.label.tipocompartilhamento")</label>
                    <input {{!is_null($parametros->idtipocompartilhamento) ? "checked" : ""}} class="o-mark__data--radio" id="idtipocompartilhamento" name="idtipocompartilhamento" type="hidden" value="{{$parametros->idtipocompartilhamento}}">
					@foreach ($tiposcompartilhamento as $tipo)
                        <label class="o-mark__text o-mark__text--block" for="idtipocompartilhamento">
                            <span class="o-mark__element" data-marked="{{$tipo->id}}" onclick="MarkController.mark(this);"></span>
                            {{$tipo->descricao}}
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="l-row" role="row">
                <div class="u-grid--12" role="grid">
                    <label class="o-form__text" for="permitircompartilhamentos">@lang("messages.label.permitircompartilhamentos")</label>
                    <input {{$parametros->permitircompartilhamentos ? "checked" : ""}} class="o-mark__data--checkbox" id="permitircompartilhamentos" name="permitircompartilhamentos" type="hidden" value="{{$parametros->permitircompartilhamentos}}">
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
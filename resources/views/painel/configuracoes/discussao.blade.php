@extends("painel.config.pagina")
@section("pagina", "Configurações - Discussão")
@section("conteudo")
    <form action="/painel/configuracoes/discussao" class="o-form" id="formblogparametros" method="POST" name="formblogparametros" role="form">
        {{method_field("PUT")}}
        <input aria-hidden="true" name="_token" type="hidden" value="{{csrf_token()}}"/>
        <input aria-hidden="true" name="id" type="hidden" value="{{$parametros->id}}"/> 
        <div class="bg-p-dashboard__header">
            <div class="o-breadcrumb--arrow">
                <span class="o-breadcrumb__link"><a href="/painel/configuracoes/geral" role="link" title="@lang("messages.menu.configuracoes")">@lang("messages.menu.configuracoes")</a></span>
                <span class="o-breadcrumb__link"><a class="is-inactive" href="/painel/configuracoes/discussao" role="link" title="@lang("messages.menu.configuracoes.discussao")">@lang("messages.menu.configuracoes.discussao")</a></span>
            </div>
        </div>
        <section class="o-form__body o-form__body--padding">
            <div class="l-row" role="row">
                <div class="u-grid--6" role="grid">
                    <label class="o-form__text" for="permitircomentarios">@lang("messages.label.permitircomentarios")</label>
                    <input {{$parametros->permitircomentarios ? "checked" : ""}} class="o-mark__data--checkbox" id="permitircomentarios" name="permitircomentarios" type="hidden" value="{{$parametros->permitircomentarios}}">
					<label class="o-mark__text"><span class="o-mark__element" data-marked="1" data-unmarked="0" onclick="MarkController.mark(this);"></span></label>
                </div>
                <div class="u-grid--6" role="grid">
                    <label class="o-form__text" for="permitircomentariosanonimos">@lang("messages.label.permitircomentariosanonimos")</label>
                    <input {{$parametros->permitircomentariosanonimos ? "checked" : ""}} class="o-mark__data--checkbox" id="permitircomentariosanonimos" name="permitircomentariosanonimos" type="hidden" value="{{$parametros->permitircomentariosanonimos}}">
					<label class="o-mark__text"><span class="o-mark__element" data-marked="1" data-unmarked="0" onclick="MarkController.mark(this);"></span></label>
                </div>
            </div> 
            <div class="l-row" role="row">
                <div class="u-grid--6" role="grid">
                    <label class="o-form__text" for="notificarnovoscomentarios">@lang("messages.label.notificarnovoscomentarios")</label>
                    <input {{$parametros->notificarnovoscomentarios ? "checked" : ""}} class="o-mark__data--checkbox" id="notificarnovoscomentarios" name="notificarnovoscomentarios" type="hidden" value="{{$parametros->notificarnovoscomentarios}}">
					<label class="o-mark__text"><span class="o-mark__element" data-marked="1" data-unmarked="0" onclick="MarkController.mark(this);"></span></label>
                </div>
                <div class="u-grid--6" role="grid">
                    <label class="o-form__text" for="comentariosdevemseraprovados">@lang("messages.label.comentariosdevemseraprovados")</label>
                    <input {{$parametros->comentariosdevemseraprovados ? "checked" : ""}} class="o-mark__data--checkbox" id="comentariosdevemseraprovados" name="comentariosdevemseraprovados" type="hidden" value="{{$parametros->comentariosdevemseraprovados}}">
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
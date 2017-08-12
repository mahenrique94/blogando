@extends("painel.config.pagina")
@section("pagina", "Usuarios - Configurações da conta")
@section("conteudo")
    <form action="/painel/usuarios/configuracoes" class="o-form" id="formpostautorparametros" method="POST" name="formpostautorparametros" role="form">
        {{method_field("PUT")}}
        <input aria-hidden="true" name="_token" type="hidden" value="{{csrf_token()}}"/>
        <input aria-hidden="true" name="id" type="hidden" value="{{$parametros->id}}"/>
        <div class="bg-p-dashboard__header">
            <div class="o-breadcrumb--arrow">
                <span class="o-breadcrumb__link"><a href="/painel/usuarios" role="link" title="@lang("messages.menu.usuarios")">@lang("messages.menu.usuarios")</a></span>
                <span class="o-breadcrumb__link"><a class="is-inactive" href="/painel/usuarios/configuracoes" role="link" title="@lang("messages.menu.usuarios.configuracoes")">@lang("messages.menu.usuarios.configuracoes")</a></span>
            </div>
        </div>
        <section class="o-form__body o-form__body--padding">
            <div class="l-row" role="row">
                <div class="u-grid--6" role="grid">
                    <label class="o-form__text" for="revisarconteudoprimeiravez">@lang("messages.label.revisarconteudoprimeiravez")</label>
                    <input {{$parametros->revisarconteudoprimeiravez ? "checked" : ""}} class="o-mark__data--checkbox" id="revisarconteudoprimeiravez" name="revisarconteudoprimeiravez" type="hidden" value="{{$parametros->revisarconteudoprimeiravez}}">
                    <label class="o-mark__text"><span class="o-mark__element" data-marked="1" data-unmarked="0" onclick="MarkController.mark(this);"></span></label>
                </div>
                <div class="u-grid--6" role="grid">
                    <label class="o-form__text" for="revisarconteudoatualizado">@lang("messages.label.revisarconteudoatualizado")</label>
                    <input {{$parametros->revisarconteudoatualizado ? "checked" : ""}} class="o-mark__data--checkbox" id="revisarconteudoatualizado" name="revisarconteudoatualizado" type="hidden" value="{{$parametros->revisarconteudoatualizado}}">
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
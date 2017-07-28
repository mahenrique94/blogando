@extends("painel.config.pagina")
@section("pagina", "Configurações - Geral")
@section("conteudo")
    <form action="/painel/configuracoes/geral" class="o-form" id="formblog" method="POST" name="formblog" role="form">
        {{method_field("PUT")}}
        <input aria-hidden="true" name="_token" type="hidden" value="{{csrf_token()}}"/>
        <input aria-hidden="true" name="id" type="hidden" value="{{$blog->id}}"/> 
        <div class="bg-p-dashboard__header">
            <div class="o-breadcrumb--arrow">
                <span class="o-breadcrumb__link"><a href="/painel/configuracoes/geral" role="link" title="@lang("messages.menu.configuracoes")">@lang("messages.menu.configuracoes")</a></span>
                <span class="o-breadcrumb__link"><a class="is-inactive" href="/painel/configuracoes/geral" role="link" title="@lang("messages.menu.configuracoes.geral")">@lang("messages.menu.configuracoes.geral")</a></span>
            </div>
        </div>
        <section class="o-form__body o-form__body--padding">
            <div class="l-row" role="row">
                <div class="u-grid--12" role="grid">
                    <label class="o-form__text" for="titulo">@lang("messages.label.titulo")</label>
                    <input {{$blog->id != null ? "" : "autofocus"}} aria-required="true" class="o-form__data" id="titulo" maxlength="120" name="titulo" required type="text" value="{{$blog->titulo}}">
                </div>
            </div> 
            <div class="l-row" role="row">
                <div class="u-grid--6" role="grid">
                    <label class="o-form__text" for="url">@lang("messages.label.url")</label>
                    <input aria-required="true" class="o-form__data" id="url" maxlength="255" name="url" required type="url" value="{{$blog->url}}">
                </div>
                <div class="u-grid--6" role="grid">
                    <label class="o-form__text" for="path">@lang("messages.label.path")</label>
                    <input class="o-form__data" id="path" maxlength="255" name="path" type="text" value="{{$blog->path}}">
                </div>
            </div> 
            <div class="l-row" role="row">
                <div class="u-grid--12" role="grid">
                    <label class="o-form__text" for="descricao">@lang("messages.label.descricao")</label>
                    <textarea aria-required="true" class="o-form__data" id="descricao" maxlength="255" name="descricao" required>{{$blog->descricao}}</textarea>
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
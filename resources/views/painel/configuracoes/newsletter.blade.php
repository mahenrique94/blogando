@extends("painel.config.pagina")
@section("pagina", "Configurações - Aparência")
@section("conteudo")
    <form action="/painel/configuracoes/newsletter" class="o-form" id="formblognewsletterparametros" method="POST" name="formblognewsletterparametros" role="form">
        {{method_field("PUT")}}
        <input aria-hidden="true" name="_token" type="hidden" value="{{csrf_token()}}"/>
        <input aria-hidden="true" name="id" type="hidden" value="{{$newsletterparametros->id}}"/> 
        <div class="bg-p-dashboard__header">
            <div class="o-breadcrumb--arrow">
                <span class="o-breadcrumb__link"><a href="/painel/configuracoes/geral" role="link" title="@lang("messages.menu.configuracoes")">@lang("messages.menu.configuracoes")</a></span>
                <span class="o-breadcrumb__link"><a class="is-inactive" href="/painel/configuracoes/geral" role="link" title="@lang("messages.menu.configuracoes.newsletter")">@lang("messages.menu.configuracoes.newsletter")</a></span>
            </div>
        </div>
        <section class="o-form__body o-form__body--padding">
            <div class="l-row" role="row">
                <div class="u-grid--12" role="grid">
                    <label class="o-form__text" for="textoacompanharposts">@lang("messages.label.textoacompanharposts")</label>
                    <textarea aria-required="true" class="o-form__data" id="textoacompanharposts" maxlength="255" name="textoacompanharposts" required>{{$newsletterparametros->textoacompanharposts}}</textarea>
                </div>
            </div> 
            <div class="l-row" role="row">
                <div class="u-grid--12" role="grid">
                    <label class="o-form__text" for="textoacompanharcomentarios">@lang("messages.label.textoacompanharcomentarios")</label>
                    <textarea aria-required="true" class="o-form__data" id="textoacompanharcomentarios" maxlength="255" name="textoacompanharcomentarios" required>{{$newsletterparametros->textoacompanharcomentarios}}</textarea>
                </div>
            </div> 
            <div class="l-row" role="row">
                <div class="u-grid--12" role="grid">
                    <label class="o-form__text" for="textoacompanharrespostas">@lang("messages.label.textoacompanharrespostas")</label>
                    <textarea aria-required="true" class="o-form__data" id="textoacompanharrespostas" maxlength="255" name="textoacompanharrespostas" required>{{$newsletterparametros->textoacompanharrespostas}}</textarea>
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
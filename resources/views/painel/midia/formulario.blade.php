@extends("painel.config.pagina")
@section("pagina", "Midia - Adicionar nova")
@section("conteudo")
    <form action="/painel/midia/adicionar" class="o-form bg-p-midia__form" enctype="multipart/form-data" id="formblogmidia" method="POST" name="formblogmidia" role="form">
        <input aria-hidden="true" name="_token" type="hidden" value="{{csrf_token()}}"/>
        <input aria-hidden="true" name="idtipomidia" type="hidden" value="1"/> {{-- 1 = Imagem --}}
        <input accept="image/jpg,image/png,image/gif" aria-hidden="true" class="is-hide js-arquivos" multiple name="arquivos[]" type="file"/>
        <div class="bg-p-dashboard__header">
            <div class="o-breadcrumb--arrow">
                <span class="o-breadcrumb__link"><a href="/painel/midia/biblioteca" role="link" title="@lang("messages.menu.midia")">@lang("messages.menu.midia")</a></span>
                <span class="o-breadcrumb__link"><a class="is-inactive" href="/painel/midia/formulario" role="link" title="@lang("messages.menu.midia.nova")">@lang("messages.menu.midia.nova")</a></span>
            </div>
        </div>
        <section class="o-form__body o-form__body--padding">
            <div class="bg-p-midia__form___caixa">
                <p class="bg-p-midia__form___descricao">@lang("messages.descricao.midia")</p>
                <button class="o-button--tie o-button--big" onclick="selecionarArquivo(event);" type="button">Selecione um arquivo</button>
            </div>
            <div class="bg-p-midia__arquivos"></div>
            <div class="l-row is-right" role="row">
                <div class="u-grid--12" role="grid">
                    <button class="o-button--tie o-button--medium" type="submit"><i class="icon-upload"></i>@lang("messages.botao.enviar")</button>
                </div>
            </div> 
        </section> 
    </form>
@stop
@extends("painel.config.pagina")
@section("pagina", "Categorias - Formulário")
@section("conteudo")
    <form action="/painel/posts/categorias" class="o-form" id="formcadcategoria" method="POST" name="formcadcategoria" role="form">
        @if ($categoria->id != null)
            <input name="_method" type="hidden" value="PUT">
        @endif
        <input aria-hidden="true" name="_token" type="hidden" value="{{csrf_token()}}"/>
        <input aria-hidden="true" name="id" type="hidden" value="{{$categoria->id}}"/>
        <div class="bg-p-dashboard__header">
            <div class="o-breadcrumb--arrow">
                <span class="o-breadcrumb__link"><a href="/painel/dashboard" role="link" title="@lang("messages.menu.dashboard")">@lang("messages.menu.dashboard")</a></span>
                <span class="o-breadcrumb__link"><a href="/painel/posts" role="link" title="@lang("messages.menu.posts")">@lang("messages.menu.posts")</a></span>
                <span class="o-breadcrumb__link"><a href="/painel/posts/categorias" role="link" title="@lang("messages.menu.posts.categorias")">@lang("messages.menu.posts.categorias")</a></span>
                <span class="o-breadcrumb__link"><a class="is-inactive" href="/painel/posts/categorias/formulario" role="link" title="@lang("messages.menu.formulario")">@lang("messages.menu.formulario")</a></span>
            </div>
            <button class="o-button--tie o-button--medium" type="submit"><i class="icon-floppy"></i>@lang("messages.botao.salvar")</button>
            <a class="o-button--tie o-button--medium" href="/painel/posts/categorias"><i class="icon-search"></i>@lang("messages.botao.pesquisar")</a>
        </div>
        <section class="o-form__body o-form__body--padding">
            <div class="l-row" role="row">
                <div class="u-grid--12" role="grid">
                    <label class="o-form__text" for="descricao">@lang("messages.label.descricao")</label>
                    <input {{$categoria->id != null ? "" : "autofocus"}} aria-required="true" class="o-form__data" id="descricao" maxlength="60" name="descricao" required type="text" value="{{$categoria->descricao}}">
                </div>
            </div>
        </section> 
    </form>
@stop
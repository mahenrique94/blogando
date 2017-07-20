@extends("painel.config.pagina")
@section("pagina", "Categorias")
@section("conteudo")
    <div class="bg-p-dashboard__header">
        <div class="o-breadcrumb--arrow">
            <span class="o-breadcrumb__link"><a href="/painel/dashboard" role="link" title="@lang("messages.menu.dashboard")">@lang("messages.menu.dashboard")</a></span>
            <span class="o-breadcrumb__link"><a href="/painel/posts" role="link" title="@lang("messages.menu.posts")">@lang("messages.menu.posts")</a></span>
            <span class="o-breadcrumb__link"><a class="is-inactive" href="/painel/posts/categorias" role="link" title="@lang("messages.menu.posts.categorias")">@lang("messages.menu.posts.categorias")</a></span>
        </div>
        <a class="o-button--tie o-button--medium" href="/painel/posts/categorias/formulario"><i class="icon-plus"></i>@lang("messages.botao.novo")</a>
    </div>
@stop
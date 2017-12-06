@extends("painel.config.pagina")
@section("pagina", "Dashboard - Meus posts favoritos")
@section("conteudo")
    <div class="bg-p-dashboard__header">
        <div class="o-breadcrumb--arrow">
            <span class="o-breadcrumb__link"><a href="/painel/dashboard" role="link" title="@lang("messages.menu.dashboard")">@lang("messages.menu.dashboard")</a></span>
            <span class="o-breadcrumb__link"><a class="is-inactive" href="/painel/dashboard/meus/posts/favoritos" role="link" title="@lang("messages.menu.dashboard.meuspostsfavoritos")">@lang("messages.menu.dashboard.meuspostsfavoritos")</a></span>
        </div>
    </div>
    @include("painel.dashboard.posts")
@stop
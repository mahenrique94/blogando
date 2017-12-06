@extends("painel.config.pagina")
@section("pagina", "Dashboard - Meus posts curtidos")
@section("conteudo")
    <div class="bg-p-dashboard__header">
        <div class="o-breadcrumb--arrow">
            <span class="o-breadcrumb__link"><a href="/painel/dashboard" role="link" title="@lang("messages.menu.dashboard")">@lang("messages.menu.dashboard")</a></span>
            <span class="o-breadcrumb__link"><a class="is-inactive" href="/painel/dashboard/meus/posts/curtidos" role="link" title="@lang("messages.menu.dashboard.meuspostscurtidos")">@lang("messages.menu.dashboard.meuspostscurtidos")</a></span>
        </div>
    </div>
    @include("painel.dashboard.posts")
@stop
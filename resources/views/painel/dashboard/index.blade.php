@extends("painel.config.pagina")
@section("pagina", "Dashboard")
@section("conteudo")
    <div class="bg-p-dashboard__header">
        <div class="o-breadcrumb--arrow">
            <span class="o-breadcrumb__link"><a href="/painel/dashboard" role="link" title="@lang("messages.menu.dashboard")">@lang("messages.menu.dashboard")</a></span>
            <span class="o-breadcrumb__link"><a class="is-inactive" href="/painel/dashboard" role="link" title="@lang("messages.menu.dashboard.inicio")">@lang("messages.menu.dashboard.inicio")</a></span>
        </div>
    </div>
@stop

<?php dd(Auth::user()) ?>
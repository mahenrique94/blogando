@extends("painel.config.pagina")
@section("pagina", "Dashboard - Meus rascunhos")
@section("conteudo")
    <div class="bg-p-dashboard__header">
        <div class="o-breadcrumb--arrow">
            <span class="o-breadcrumb__link"><a href="/painel/dashboard" role="link" title="@lang("messages.menu.dashboard")">@lang("messages.menu.dashboard")</a></span>
            <span class="o-breadcrumb__link"><a class="is-inactive" href="/painel/dashboard/meus-rascunhos" role="link" title="@lang("messages.menu.dashboard.meusrascunhos")">@lang("messages.menu.dashboard.meusrascunhos")</a></span>
        </div>
        <a class="o-button--tie o-button--medium" href="/painel/post/formulario"><i class="icon-plus"></i>@lang("messages.botao.novo")</a>
        <form action="/painel/dashboard/meus-rascunhos" class="o-form" id="formmeusrascunhos" method="get" name="formmeusrascunhos" role="search">
            <div class="l-row" role="row">
                <div class="u-grid--2" role="grid">
                    <select class="o-form__data" name="campo">
                        <option value="">Selecione um filtro</option>
                        <option value="id">Id</option>
                        <option value="titulo">Título</option>
                    </select>
                </div>
                <div class="u-grid--10" role="grid" style="margin-top: 1rem;">
                    <div class="o-form__group">
                        <input class="o-form__data" name="filtro" placeholder="@lang("messages.placeholder.filtro")" type="search">
                        <span class="o-form__groupElement"><button class="o-button--tie"><i class="icon-search"></i></button></span>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @include("painel.post.posts")
@stop
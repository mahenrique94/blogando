@extends("painel.config.pagina")
@section("pagina", "Comentários")
@section("conteudo")
    <div class="bg-p-dashboard__header">
        <div class="o-breadcrumb--arrow">
            <span class="o-breadcrumb__link"><a class="is-inactive" href="/painel/comentario" role="link" title="@lang("messages.menu.comentarios")">@lang("messages.menu.comentarios")</a></span>
        </div>
        <form action="/painel/comentario" class="o-form" id="formpostcomentariolistar" method="get" name="formpostcomentariolistar" role="search">
            <div class="l-row" role="row">
                <div class="u-grid--2" role="grid">
                    <select class="o-form__data" name="campo">
                        <option value="">Selecione um filtro</option>
                        <option value="id">Id</option>
                        <option value="nome">Nome</option>
                        <option value="email">Email</option>
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
    @include("painel.postComentario.comentarios")
@stop
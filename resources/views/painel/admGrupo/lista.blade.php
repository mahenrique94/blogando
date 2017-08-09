@extends("painel.config.pagina")
@section("pagina", "Grupos")
@section("conteudo")
    <div class="bg-p-dashboard__header">
        <div class="o-breadcrumb--arrow">
            <span class="o-breadcrumb__link"><a href="/painel/administrador/grupos" role="link" title="@lang("messages.menu.administrador")">@lang("messages.menu.administrador")</a></span>
            <span class="o-breadcrumb__link"><a class="is-inactive" href="/painel/administrador/grupo" role="link" title="@lang("messages.menu.administrador.grupos")">@lang("messages.menu.administrador.grupos")</a></span>
        </div>
        <a class="o-button--tie o-button--medium" href="/painel/administrador/grupo/formulario"><i class="icon-plus"></i>@lang("messages.botao.novo")</a>
        <form action="/painel/administrador/grupo" class="o-form" id="formadmgrupolistar" method="get" name="formadmgrupolistar" role="search">
            <div class="l-row" role="row">
                <div class="u-grid--2" role="grid">
                    <select class="o-form__data" name="campo">
                        <option value="">Selecione um filtro</option>
                        <option value="id">Id</option>
                        <option value="descricao">Descrição</option>
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
    <table class="c-table--tie c-table--hovered c-table--zebrered c-table--bordered">
        <thead>
            <tr>
                <th>@lang("messages.label.descricao")</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($grupos as $grupo)
                <tr>
                    <td>{{$grupo->descricao}}</td>
                    <td style="font-size: 1.1rem;text-align: center;width: 50px;"><a href="/painel/administrador/grupo/{{$grupo->id}}" role="link" title="@lang("messages.botao.editar")"><i class="icon-pencil"></i></a></td>
                    <td style="font-size: 1.1rem;text-align: center;width: 50px;"><button formaction="/painel/administrador/grupo/{{$grupo->id}}" onclick="DialogController.build(event, this, requestDelete, 'Deseja confirmar a exclusao', 'icon-trash');" role="button" type="button" style="background: transparent;border: none;" title="@lang("messages.botao.deletar")"><i class="icon-trash"></i></button></td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">@lang("messages.mensagem.tabelavazia")</td>
                </tr>                
            @endforelse
        </tbody>
    </table>
@stop
@extends("painel.config.pagina")
@section("pagina", "Configurações - Rede social")
@section("conteudo")
    <div class="bg-p-dashboard__header">
        <div class="o-breadcrumb--arrow">
            <span class="o-breadcrumb__link"><a href="/painel/configuracoes/geral" role="link" title="@lang("messages.menu.configuracoes")">@lang("messages.menu.configuracoes")</a></span>
            <span class="o-breadcrumb__link"><a class="is-inactive" href="/painel/configuracoes/rede-social" role="link" title="@lang("messages.menu.configuracoes.redesocial")">@lang("messages.menu.configuracoes.redesocial")</a></span>
        </div>
        <a class="o-button--tie o-button--medium" href="/painel/configuracoes/rede-social/formulario"><i class="icon-plus"></i>@lang("messages.botao.nova")</a>
        <form action="/painel/configuracoes/rede-social" class="o-form" id="formblogredesocial" method="get" name="formblogredesocial" role="search">
            <div class="l-row" role="row">
                <div class="u-grid--2" role="grid">
                    <select class="o-form__data" name="campo">
                        <option value="">Selecione um filtro</option>
                        <option value="id">Id</option>
                        <option value="link">Link</option>
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
                <th>@lang("messages.label.redesocial")</th>
                <th>@lang("messages.label.link")</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($redessociais as $redesocial)
                <tr>
                    <td>{{$redesocial->redesocial->descricao}}</td>
                    <td>{{$redesocial->link}}</td>
                    <td style="font-size: 1.1rem;text-align: center;width: 50px;"><a href="/painel/configuracoes/rede-social/{{$redesocial->id}}" role="link" title="@lang("messages.botao.editar")"><i class="icon-pencil"></i></a></td>
                    <td style="font-size: 1.1rem;text-align: center;width: 50px;"><button formaction="/painel/configuracoes/rede-social/{{$redesocial->id}}" onclick="DialogController.build(event, this, requestDelete, 'Deseja confirmar a exclusao', 'icon-trash');" role="button" type="button" style="background: transparent;border: none;" title="@lang("messages.botao.deletar")"><i class="icon-trash"></i></button></td>
                </tr>
            @empty
                <tr>
                    <td colspan="9">@lang("messages.mensagem.tabelavazia")</td>
                </tr>                
            @endforelse
        </tbody>
    </table>
@stop
@extends("painel.config.pagina")
@section("pagina", "Usuários")
@section("conteudo")
    <div class="bg-p-dashboard__header">
        <div class="o-breadcrumb--arrow">
            <span class="o-breadcrumb__link"><a href="/painel/usuarios" role="link" title="@lang("messages.menu.usuarios")">@lang("messages.menu.usuarios")</a></span>
            <span class="o-breadcrumb__link"><a class="is-inactive" href="/painel/usuarios" role="link" title="@lang("messages.menu.usuarios.todos")">@lang("messages.menu.usuarios.todos")</a></span>
        </div>
        <a class="o-button--tie o-button--medium" href="/painel/usuarios/formulario"><i class="icon-plus"></i>@lang("messages.botao.novo")</a>
        <form action="/painel/usuarios" class="o-form" id="formpostautorlistar" method="get" name="formpostautorlistar" role="search">
            <div class="l-row" role="row">
                <div class="u-grid--2" role="grid">
                    <select class="o-form__data" name="campo">
                        <option value="">Selecione um filtro</option>
                        <option value="id">Id</option>
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
    <table class="c-table--tie c-table--hovered c-table--zebrered c-table--bordered">
        <thead>
        <tr>
            <th>@lang("messages.label.email")</th>
            <th>@lang("messages.label.inativo")</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @forelse ($usuarios as $usuario)
            <tr>
                <td>{{$usuario->email}}</td>
                <td style="font-size: 1.1rem;text-align: center;width: 70px;">
                    @if ($usuario->inativo)
                        <i class="icon-ok"></i>
                    @else
                        <i class="icon-cancel"></i>
                    @endif
                </td>
                <td style="font-size: 1.1rem;text-align: center;width: 50px;"><a href="/painel/usuarios/{{$usuario->id}}" role="link" title="@lang("messages.botao.editar")"><i class="icon-pencil"></i></a></td>
                <td style="font-size: 1.1rem;text-align: center;width: 50px;"><button formaction="/painel/usuarios/{{$usuario->id}}" onclick="DialogController.build(event, this, requestDelete, 'Deseja confirmar a exclusao', 'icon-trash');" role="button" type="button" style="background: transparent;border: none;" title="@lang("messages.botao.deletar")"><i class="icon-trash"></i></button></td>
            </tr>
        @empty
            <tr>
                <td colspan="4">@lang("messages.mensagem.tabelavazia")</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@stop
<table class="c-table--tie c-table--hovered c-table--zebrered c-table--bordered">
    <thead>
        <tr>
            <th>@lang("messages.label.nome")</th>
            <th>@lang("messages.label.grupo")</th>
            <th>@lang("messages.label.inativo")</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($usuario->perfils as $perfil)
            <tr>
                <td>{{$perfil->nome}}</td>
                <td>{{$perfil->grupo->descricao}}</td>
                <td style="font-size: 1.1rem;text-align: center;width: 70px;">
                    @if ($perfil->inativo)
                        <i class="icon-ok"></i>
                    @else
                        <i class="icon-cancel"></i>
                    @endif
                </td>
                <td style="font-size: 1.1rem;text-align: center;width: 50px;"><a href="/painel/usuarios/perfil/{{$perfil->id}}" role="link" title="@lang("messages.botao.editar")"><i class="icon-pencil"></i></a></td>
                <td style="font-size: 1.1rem;text-align: center;width: 50px;"><button formaction="/painel/usuarios/perfil/{{$perfil->id}}" onclick="DialogController.build(event, this, requestDelete, 'Deseja confirmar a exclusao', 'icon-trash');" role="button" type="button" style="background: transparent;border: none;" title="@lang("messages.botao.deletar")"><i class="icon-trash"></i></button></td>
            </tr>
        @empty
            <tr>
                <td colspan="8">@lang("messages.mensagem.tabelavazia")</td>
            </tr>
        @endforelse
    </tbody>
</table>
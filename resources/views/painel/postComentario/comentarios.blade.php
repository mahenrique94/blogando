<table class="c-table--tie c-table--hovered c-table--zebrered c-table--bordered">
    <thead>
    <tr>
        <th>@lang("messages.label.post")</th>
        <th>@lang("messages.label.nome")</th>
        <th>@lang("messages.label.email")</th>
        <th>@lang("messages.label.comentario")</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @forelse ($comentarios as $comentario)
        <tr>
            <td>{{$comentario->post->titulo}}</td>
            <td>{{$comentario->nome}}</td>
            <td>{{$comentario->email}}</td>
            <td>{{$comentario->comentario}}</td>
            <td style="font-size: 1.1rem;text-align: center;width: 50px;"><a href="/painel/comentario/{{$comentario->id}}" role="link" title="@lang("messages.botao.editar")"><i class="icon-pencil"></i></a></td>
            <td style="font-size: 1.1rem;text-align: center;width: 50px;"><button formaction="/painel/comentario/{{$comentario->id}}" onclick="DialogController.build(event, this, requestDelete, 'Deseja confirmar a exclusao', 'icon-trash');" role="button" type="button" style="background: transparent;border: none;" title="@lang("messages.botao.deletar")"><i class="icon-trash"></i></button></td>
        </tr>
    @empty
        <tr>
            <td colspan="6">@lang("messages.mensagem.tabelavazia")</td>
        </tr>
    @endforelse
    </tbody>
</table>
<table class="c-table--tie c-table--hovered c-table--zebrered c-table--bordered">
    <thead>
        <tr>
            <th>@lang("messages.label.titulo")</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($posts as $post)
            <tr>
                <td>{{$post->titulo}}</td>
                <td style="font-size: 1.1rem;text-align: center;width: 50px;"><a href="@if ($post->idsituacao == \App\Http\Parametros::SITUACAOPOST_PUBLICADO) /{{$post->slug}} @else /painel/post/pre-visualizar/{{$post->idsituacao}}/{{$post->slug}} @endif" role="link" target="_blank" title="@lang("messages.botao.visualizar")"><i class="icon-eye"></i></a></td>
                <td style="font-size: 1.1rem;text-align: center;width: 50px;"><a href="/painel/post/{{$post->id}}" role="link" title="@lang("messages.botao.editar")"><i class="icon-pencil"></i></a></td>
                <td style="font-size: 1.1rem;text-align: center;width: 50px;"><button formaction="/painel/post/{{$post->id}}" onclick="DialogController.build(event, this, requestDelete, 'Deseja confirmar a exclusao', 'icon-trash');" role="button" type="button" style="background: transparent;border: none;" title="@lang("messages.botao.deletar")"><i class="icon-trash"></i></button></td>
            </tr>
        @empty
            <tr>
                <td colspan="4">@lang("messages.mensagem.tabelavazia")</td>
            </tr>            
        @endforelse
    </tbody>
</table>
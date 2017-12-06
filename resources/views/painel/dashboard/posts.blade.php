<table class="c-table--tie c-table--hovered c-table--zebrered c-table--bordered">
    <thead>
        <tr>
            <th>@lang("messages.label.titulo")</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($estatisticas as $estatistica)
            <tr>
                <td>{{$estatistica->post->titulo}}</td>
                <td style="font-size: 1.1rem;text-align: center;width: 50px;"><a href="/{{$estatistica->post->slug}}" role="link" target="_blank" title="@lang("messages.botao.visualizar")"><i class="icon-eye"></i></a></td>
            </tr>
        @empty
            <tr>
                <td colspan="4">@lang("messages.mensagem.tabelavazia")</td>
            </tr>            
        @endforelse
    </tbody>
</table>
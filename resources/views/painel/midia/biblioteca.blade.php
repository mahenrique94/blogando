@extends("painel.config.pagina")
@section("pagina", "Midias")
@section("conteudo")
    <div class="bg-p-dashboard__header">
        <div class="o-breadcrumb--arrow">
            <span class="o-breadcrumb__link"><a href="/painel/midia/biblioteca" role="link" title="@lang("messages.menu.midia")">@lang("messages.menu.midia")</a></span>
            <span class="o-breadcrumb__link"><a class="is-inactive" href="/painel/midia/biblioteca" role="link" title="@lang("messages.menu.midia.biblioteca")">@lang("messages.menu.midia.biblioteca")</a></span>
        </div>
        <a class="o-button--tie o-button--medium" href="/painel/midia/formulario"><i class="icon-plus"></i>@lang("messages.botao.nova")</a>
    </div>
    <div class="bg-p-midia__lista">
        <div class="bg-p-midia__arquivos">
            @foreach ($midias as $midia)
                <div class="bg-p-midia__caixa">
                    <a href="/arquivo/visualizar/arquivos-imagens/{{date_format(date_create($midia->created_at), "Y")}}/{{date_format(date_create($midia->created_at), "m")}}/{{$midia->slug}}" target="_blank"><img alt="{{$midia->nome}}" class="bg-p-midia__arquivo" src="/arquivo/download/arquivos-imagens/{{date_format(date_create($midia->created_at), "Y")}}/{{date_format(date_create($midia->created_at), "m")}}/{{$midia->slug}}"></a>
                    <table class="bg-p-midia__tabela">
                        <tbody>
                            <tr>
                                <td class="bg-p-midia__tabela___titulo" colspan="2">{{$midia->nome}}</td>
                            </tr>
                            <tr>
                                <td><input class="bg-p-midia__tabela___link js-link" type="text" value="{{$blog->url}}/arquivo/download/arquivos-imagens/{{date_format(date_create($midia->created_at), "Y")}}/{{date_format(date_create($midia->created_at), "m")}}/{{$midia->slug}}"></td>
                                <td><a class="bg-p-midia__tabela___copiar" href="#" onclick="copiarClipboard(this, event);" title="@lang("messages.botao.copiar")"><i class="icon-paste"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endforeach
        </div>
    </div>
@stop
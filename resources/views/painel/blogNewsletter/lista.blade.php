@extends("painel.config.pagina")
@section("pagina", "Newsletter")
@section("conteudo")
    <div class="bg-p-dashboard__header">
        <div class="o-breadcrumb--arrow">
            <span class="o-breadcrumb__link"><a href="/painel/newsletter" role="link" title="@lang("messages.menu.newsletter")">@lang("messages.menu.newsletter")</a></span>
        </div>
        <a class="o-button--tie o-button--medium" href="/painel/newsletter/formulario"><i class="icon-plus"></i>@lang("messages.botao.nova")</a>
        <form action="/painel/newsletter" class="o-form" id="formblognewsletterlistar" method="get" name="formblognewsletterlistar" role="search">
            <div class="l-row" role="row">
                <div class="u-grid--2" role="grid">
                    <select class="o-form__data" name="campo">
                        <option value="">Selecione um filtro</option>
                        <option value="id">Id</option>
                        <option value="email">Email</option>
                        <option value="nome">Nome</option>
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
            <th>@lang("messages.label.nome")</th>
            <th>@lang("messages.label.email")</th>
            <th>@lang("messages.label.inativo")</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @forelse ($newsletter as $newsletter)
            <tr>
                <td>{{$newsletter->nome}}</td>
                <td>{{$newsletter->email}}</td>
                <td style="font-size: 1.1rem;text-align: center;width: 70px;">
                    @if ($newsletter->inativo)
                        <i class="icon-ok"></i>
                    @else
                        <i class="icon-cancel"></i>
                    @endif
                </td>
                <td style="font-size: 1.1rem;text-align: center;width: 50px;"><a href="/painel/newsletter/{{$newsletter->id}}" role="link" title="@lang("messages.botao.editar")"><i class="icon-pencil"></i></a></td>
                <td style="font-size: 1.1rem;text-align: center;width: 50px;"><button formaction="/painel/newsletter/{{$newsletter->id}}" onclick="DialogController.build(event, this, requestDelete, 'Deseja confirmar a exclusao', 'icon-trash');" role="button" type="button" style="background: transparent;border: none;" title="@lang("messages.botao.deletar")"><i class="icon-trash"></i></button></td>
            </tr>
        @empty
            <tr>
                <td colspan="5">@lang("messages.mensagem.tabelavazia")</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@stop
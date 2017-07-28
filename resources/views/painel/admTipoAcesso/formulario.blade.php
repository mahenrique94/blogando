@extends("painel.config.pagina")
@section("pagina", "Permissões - Formulário")
@section("conteudo")
    <form action="/painel/administrador/tipo-de-acesso" class="o-form" id="formadmtipoacesso" method="POST" name="formadmtipoacesso" role="form">
        @if ($acesso->id != null)
            {{method_field("PUT")}}
        @endif
        <input aria-hidden="true" name="_token" type="hidden" value="{{csrf_token()}}"/>
        <input aria-hidden="true" name="id" type="hidden" value="{{$acesso->id}}"/>
        <div class="bg-p-dashboard__header">
            <div class="o-breadcrumb--arrow">
                <span class="o-breadcrumb__link"><a href="/painel/administrador/grupos" role="link" title="@lang("messages.menu.administrador")">@lang("messages.menu.administrador")</a></span>
                <span class="o-breadcrumb__link"><a href="/painel/administrador/tipo-de-acesso" role="link" title="@lang("messages.menu.administrador.tipoacesso")">@lang("messages.menu.administrador.tipoacesso")</a></span>
                <span class="o-breadcrumb__link"><a class="is-inactive" href="/painel/administrador/tipo-de-acesso/formulario" role="link" title="@lang("messages.menu.formulario")">@lang("messages.menu.formulario")</a></span>
            </div>
            <button class="o-button--tie o-button--medium" type="submit"><i class="icon-floppy"></i>@lang("messages.botao.salvar")</button>
            <a class="o-button--tie o-button--medium" href="/painel/administrador/tipo-de-acesso"><i class="icon-search"></i>@lang("messages.botao.pesquisar")</a>
        </div>
        <section class="o-form__body o-form__body--padding">
            <div class="l-row" role="row">
                <div class="u-grid--12" role="grid">
                    <label class="o-form__text" for="descricao">@lang("messages.label.descricao")</label>
                    <input {{$acesso->id != null ? "" : "autofocus"}} aria-required="true" class="o-form__data" id="descricao" maxlength="60" name="descricao" required type="text" value="{{$acesso->descricao}}">
                </div>
            </div>
            <div class="l-row" role="row">
                <div class="u-grid--12" role="grid">
                    <label class="o-form__text" for="idpermissao">@lang("messages.label.permissao")</label>
                    <select aria-required="true" class="o-form__data" id="idpermissao" name="idpermissao" required>
                        @foreach ($permissoes as $permissao)
                            <option {{$acesso->idpermissao == $permissao->id ? "selected" : ""}} value="{{$permissao->id}}">{{$permissao->descricao}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </section> 
    </form>
@stop
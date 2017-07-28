@extends("painel.config.pagina")
@section("pagina", "Grupo - Formulário")
@section("conteudo")
    <form action="/painel/administrador/grupo" class="o-form" id="formadmgrupo" method="POST" name="formadmgrupo" role="form">
        @if ($grupo->id != null)
            {{method_field("PUT")}}
        @endif
        <input aria-hidden="true" name="_token" type="hidden" value="{{csrf_token()}}"/>
        <input aria-hidden="true" name="id" type="hidden" value="{{$grupo->id}}"/>
        <div class="bg-p-dashboard__header">
            <div class="o-breadcrumb--arrow">
                <span class="o-breadcrumb__link"><a href="/painel/administrador/grupos" role="link" title="@lang("messages.menu.administrador")">@lang("messages.menu.administrador")</a></span>
                <span class="o-breadcrumb__link"><a href="/painel/administrador/grupo" role="link" title="@lang("messages.menu.administrador.grupos")">@lang("messages.menu.administrador.grupos")</a></span>
                <span class="o-breadcrumb__link"><a class="is-inactive" href="/painel/administrador/grupo/formulario" role="link" title="@lang("messages.menu.formulario")">@lang("messages.menu.formulario")</a></span>
            </div>
            <button class="o-button--tie o-button--medium" type="submit"><i class="icon-floppy"></i>@lang("messages.botao.salvar")</button>
            <a class="o-button--tie o-button--medium" href="/painel/administrador/grupo"><i class="icon-search"></i>@lang("messages.botao.pesquisar")</a>
        </div>
        <section class="o-form__body o-form__body--padding">
            <div class="l-row" role="row">
                <div class="u-grid--12" role="grid">
                    <label class="o-form__text" for="descricao">@lang("messages.label.descricao")</label>
                    <input {{$grupo->id != null ? "" : "autofocus"}} aria-required="true" class="o-form__data" id="descricao" maxlength="60" name="descricao" required type="text" value="{{$grupo->descricao}}">
                </div>
            </div>
            <div class="l-row" role="row">
                <div class="u-grid--12" role="grid">
                    <label class="o-form__text" for="idtipoacesso">@lang("messages.label.permissao")</label>
                    <select aria-required="true" class="o-form__data" id="idtipoacesso" name="idtipoacesso" required>
                        @foreach ($tiposdeacesso as $acesso)
                            <option {{$grupo->idtipoacesso == $acesso->id ? "selected" : ""}} value="{{$acesso->id}}">{{$acesso->descricao}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </section> 
    </form>
@stop
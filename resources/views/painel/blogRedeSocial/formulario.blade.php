@extends("painel.config.pagina")
@section("pagina", "Permissões - Formulário")
@section("conteudo")
    <form action="/painel/configuracoes/rede-social" class="o-form" id="formblogredesocial" method="POST" name="formblogredesocial" role="form">
        @if ($redesocial->id != null)
            {{method_field("PUT")}}
        @endif
        <input aria-hidden="true" name="_token" type="hidden" value="{{csrf_token()}}"/>
        <input aria-hidden="true" name="id" type="hidden" value="{{$redesocial->id}}"/>
        <div class="bg-p-dashboard__header">
            <div class="o-breadcrumb--arrow">
                <span class="o-breadcrumb__link"><a href="/painel/configuracoes/geral" role="link" title="@lang("messages.menu.configuracoes")">@lang("messages.menu.configuracoes")</a></span>
                <span class="o-breadcrumb__link"><a href="/painel/configuracoes/rede-social" role="link" title="@lang("messages.menu.configuracoes.redesocial")">@lang("messages.menu.configuracoes.redesocial")</a></span>
                <span class="o-breadcrumb__link"><a class="is-inactive" href="/painel/configuracoes/rede-social/formulario" role="link" title="@lang("messages.menu.formulario")">@lang("messages.menu.formulario")</a></span>
            </div>
            <button class="o-button--tie o-button--medium" type="submit"><i class="icon-floppy"></i>@lang("messages.botao.salvar")</button>
            <a class="o-button--tie o-button--medium" href="/painel/configuracoes/rede-social"><i class="icon-search"></i>@lang("messages.botao.pesquisar")</a>
        </div>
        <section class="o-form__body o-form__body--padding">
            <div class="l-row" role="row">
                <div class="u-grid--6" role="grid">
                    <label class="o-form__text" for="idredesocial">@lang("messages.label.redesocial")</label>
                    <select {{$redesocial->id != null ? "" : "autofocus"}} aria-required="true" class="o-form__data" id="idredesocial" name="idredesocial" required>
                        <option value="">Selecione uma rede social</option>
                        @foreach ($redessociais as $rede)
                            <option {{$redesocial->idredesocial == $rede->id ? "selected" : ""}} value="{{$rede->id}}">{{$rede->descricao}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="u-grid--6" role="grid">
                    <label class="o-form__text" for="link">@lang("messages.label.link")</label>
                    <input aria-required="true" class="o-form__data" id="link" maxlength="255" name="link" required type="url" value="{{$redesocial->link}}">
                </div>
            </div>
        </section> 
    </form>
@stop
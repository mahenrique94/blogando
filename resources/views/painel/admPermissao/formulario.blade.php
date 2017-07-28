@extends("painel.config.pagina")
@section("pagina", "Permissões - Formulário")
@section("conteudo")
    <form action="/painel/administrador/permissao" class="o-form" id="formadmpermissao" method="POST" name="formadmpermissao" role="form">
        @if ($permissao->id != null)
            {{method_field("PUT")}}
        @endif
        <input aria-hidden="true" name="_token" type="hidden" value="{{csrf_token()}}"/>
        <input aria-hidden="true" name="id" type="hidden" value="{{$permissao->id}}"/>
        <div class="bg-p-dashboard__header">
            <div class="o-breadcrumb--arrow">
                <span class="o-breadcrumb__link"><a href="/painel/administrador/grupos" role="link" title="@lang("messages.menu.administrador")">@lang("messages.menu.administrador")</a></span>
                <span class="o-breadcrumb__link"><a href="/painel/administrador/permissao" role="link" title="@lang("messages.menu.administrador.permissoes")">@lang("messages.menu.administrador.permissoes")</a></span>
                <span class="o-breadcrumb__link"><a class="is-inactive" href="/painel/administrador/permissao/formulario" role="link" title="@lang("messages.menu.formulario")">@lang("messages.menu.formulario")</a></span>
            </div>
            <button class="o-button--tie o-button--medium" type="submit"><i class="icon-floppy"></i>@lang("messages.botao.salvar")</button>
            <a class="o-button--tie o-button--medium" href="/painel/administrador/permissao"><i class="icon-search"></i>@lang("messages.botao.pesquisar")</a>
        </div>
        <section class="o-form__body o-form__body--padding">
            <div class="l-row" role="row">
                <div class="u-grid--12" role="grid">
                    <label class="o-form__text" for="descricao">@lang("messages.label.descricao")</label>
                    <input {{$permissao->id != null ? "" : "autofocus"}} aria-required="true" class="o-form__data" id="descricao" maxlength="60" name="descricao" required type="text" value="{{$permissao->descricao}}">
                </div>
            </div>
            <div class="l-row" role="row">
                <div class="u-grid--2" role="grid">
                    <label class="o-form__text" for="deletar">@lang("messages.label.deletar")</label>
                    <input {{$permissao->deletar ? "checked" : ""}} class="o-mark__data--checkbox" id="deletar" name="deletar" type="hidden" value="{{is_null($permissao->id) ? 0 : $permissao->deletar}}">
					<label class="o-mark__text"><span class="o-mark__element" data-marked="1" data-unmarked="0" onclick="MarkController.mark(this);"></span></label>
                </div>
                <div class="u-grid--2" role="grid">
                    <label class="o-form__text" for="editar">@lang("messages.label.editar")</label>
                    <input {{$permissao->editar ? "checked" : ""}} class="o-mark__data--checkbox" id="editar" name="editar" type="hidden" value="{{is_null($permissao->id) ? 0 : $permissao->editar}}">
					<label class="o-mark__text"><span class="o-mark__element" data-marked="1" data-unmarked="0" onclick="MarkController.mark(this);"></span></label>
                </div>
                <div class="u-grid--2" role="grid">
                    <label class="o-form__text" for="listar">@lang("messages.label.listar")</label>
                    <input {{$permissao->listar ? "checked" : ""}} class="o-mark__data--checkbox" id="listar" name="listar" type="hidden" value="{{is_null($permissao->id) ? 0 : $permissao->listar}}">
					<label class="o-mark__text"><span class="o-mark__element" data-marked="1" data-unmarked="0" onclick="MarkController.mark(this);"></span></label>
                </div>
                <div class="u-grid--2" role="grid">
                    <label class="o-form__text" for="salvar">@lang("messages.label.salvar")</label>
                    <input {{$permissao->salvar ? "checked" : ""}} class="o-mark__data--checkbox" id="salvar" name="salvar" type="hidden" value="{{is_null($permissao->id) ? 0 : $permissao->salvar}}">
					<label class="o-mark__text"><span class="o-mark__element" data-marked="1" data-unmarked="0" onclick="MarkController.mark(this);"></span></label>
                </div>
                <div class="u-grid--2" role="grid">
                    <label class="o-form__text" for="visualizar">@lang("messages.label.visualizar")</label>
                    <input {{$permissao->visualizar ? "checked" : ""}} class="o-mark__data--checkbox" id="visualizar" name="visualizar" type="hidden" value="{{is_null($permissao->id) ? 0 : $permissao->visualizar}}">
					<label class="o-mark__text"><span class="o-mark__element" data-marked="1" data-unmarked="0" onclick="MarkController.mark(this);"></span></label>
                </div>
            </div> 
        </section> 
    </form>
@stop
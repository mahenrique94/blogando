@extends("painel.config.pagina")
@section("pagina", "Usuarios - Adicionar novo")
@section("conteudo")
    <form action="/painel/usuarios" class="o-form" enctype="multipart/form-data" id="formadmusuario" method="POST" name="formadmusuario" role="form">
        @if ($usuario->id != null)
            {{method_field("PUT")}}
        @endif
        <input aria-hidden="true" name="_token" type="hidden" value="{{csrf_token()}}"/>
        <input aria-hidden="true" name="id" type="hidden" value="{{$usuario->id}}"/>
        <div class="bg-p-dashboard__header">
            <div class="o-breadcrumb--arrow">
                <span class="o-breadcrumb__link"><a href="/painel/usuarios" role="link" title="@lang("messages.menu.usuarios")">@lang("messages.menu.usuarios")</a></span>
                <span class="o-breadcrumb__link"><a href="/painel/usuarios/{{$usuario->id}}" role="link" title="@lang("messages.menu.formulario")">@lang("messages.menu.formulario")</a></span>
            </div>
            <button class="o-button--tie o-button--medium" type="submit"><i class="icon-floppy"></i>@lang("messages.botao.salvar")</button>
            <a class="o-button--tie o-button--medium" href="/painel/usuarios"><i class="icon-search"></i>@lang("messages.botao.pesquisar")</a>
            <a class="o-button--tie o-button--medium" href="/painel/usuarios/configuracoes/{{$usuario->id}}"><i class="icon-cog-alt"></i>@lang("messages.botao.configuracoes")</a>
        </div>
        <section class="o-form__body o-form__body--padding">
            <div class="l-row" role="row">
                <div class="u-grid--6" role="grid">
                    <label class="o-form__text" for="email">@lang("messages.label.email")</label>
                    <input aria-required="true" {{$usuario->id != null ? "" : "autofocus"}} class="o-form__data" id="email" maxlength="255" name="email" required type="email" value="{{$usuario->email}}">
                </div>
                <div class="u-grid--6" role="grid">
                    <label class="o-form__text" for="senha">@lang("messages.label.senha")</label>
                    <input aria-required="true" class="o-form__data" id="senha" maxlength="255" name="senha" required type="password" value="{{$usuario->senha}}">
                </div>
            </div>
            <div class="l-row" role="row">
                <div class="u-grid--12" role="grid">
                    <label class="o-form__text" for="inativo">@lang("messages.label.inativo")</label>
                    <input {{$usuario->inativo ? "checked" : ""}} class="o-mark__data--checkbox" id="inativo" name="inativo" type="hidden" value="{{is_null($usuario->id) ? 0 : $usuario->inativo}}">
                    <label class="o-mark__text"><span class="o-mark__element" data-marked="1" data-unmarked="0" onclick="MarkController.mark(this);"></span></label>
                </div>
            </div>
            @if (!is_null($usuario->id) && $usuario->id > 0)
                <div class="c-block--kal">
                    <div class="c-block__header">
                        <label class="c-block__title">@lang("messages.titulo.perfil")</label>
                    </div>
                    <section class="c-block__body">
                        <div class="o-band--tie"><a href="/painel/usuarios/perfil/formulario?usuario={{$usuario->id}}" class="o-button--tie o-button--small"><i class="icon-plus"></i>@lang("messages.botao.novo")</a></div>
                        @include("painel.tblPerfil.lista")
                    </section>
                </div>
            @endif
        </section>
    </form>
@stop
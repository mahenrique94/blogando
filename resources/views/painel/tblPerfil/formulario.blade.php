@extends("painel.config.pagina")
@section("pagina", "Usuarios - Perfil")
@section("conteudo")
    <form action="/painel/usuarios/perfil" class="o-form" enctype="multipart/form-data" id="formtblperfil" method="POST" name="formtblperfil" role="form">
        @if ($perfil->id != null)
            {{method_field("PUT")}}
        @endif
        <input aria-hidden="true" name="_token" type="hidden" value="{{csrf_token()}}"/>
        <input aria-hidden="true" name="id" type="hidden" value="{{$perfil->id}}"/>
        <input aria-hidden="true" name="idusuario" type="hidden" value="{{$perfil->id != null ? $perfil->idusuario : $_GET["usuario"]}}"/>
        <input aria-hidden="true" name="imagem" type="hidden" value="{{$perfil->imagem}}"/>
        <input accept="image/jpg" aria-hidden="true" class="is-hide js-inputImagem" id="file" name="file" type="file"/>
        <div class="bg-p-dashboard__header">
            <div class="o-breadcrumb--arrow">
                <span class="o-breadcrumb__link"><a href="/painel/usuarios" role="link" title="@lang("messages.menu.usuarios")">@lang("messages.menu.usuarios")</a></span>
                <span class="o-breadcrumb__link"><a href="/painel/usuarios/{{$perfil->id}}" role="link" title="@lang("messages.menu.usuarios.perfil")">@lang("messages.menu.usuarios.perfil")</a></span>
            </div>
            <button class="o-button--tie o-button--medium" type="submit"><i class="icon-floppy"></i>@lang("messages.botao.salvar")</button>
            <a class="o-button--tie o-button--medium" href="/painel/usuarios/{{$perfil->id != null ? $perfil->idusuario : $_GET["usuario"]}}"><i class="icon-left-big"></i>@lang("messages.botao.voltar")</a>
        </div>
        <section class="o-form__body o-form__body--padding">
            <div class="l-row" role="row">
                <div class="u-grid--9" role="grid">
                    <div class="l-row" role="row">
                        <div class="u-grid--6" role="grid">
                            <label class="o-form__text" for="nome">@lang("messages.label.nome")</label>
                            <input {{$perfil->id != null ? "" : "autofocus"}} aria-required="true" class="o-form__data" id="nome" maxlength="120" name="nome" required type="text" value="{{$perfil->nome}}">
                        </div>
                        <div class="u-grid--6" role="grid">
                            <label class="o-form__text" for="apelido">@lang("messages.label.apelido")</label>
                            <input class="o-form__data" id="apelido" maxlength="60" name="apelido" type="text" value="{{$perfil->apelido}}">
                        </div>
                    </div>
                    <div class="l-row" role="row">
                        <div class="u-grid--12" role="grid">
                            <label class="o-form__text" for="grupo">@lang("messages.label.grupo")</label>
                            <select aria-required="true" class="o-form__data" id="grupo" name="grupo" required>
                                @foreach($grupos as $grupo)
                                    <option {{$grupo->id == $perfil->idgrupo ? "selected" : ""}} value="{{$grupo->id}}">{{$grupo->descricao}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="u-grid--3" role="grid">
                    <div class="bg-p-caixa">
                        <div class="bg-p-caixa__cabecalho">@lang("messages.caixa.imagemautor")</div>
                        <div class="bg-p-caixa__corpo">
                            @if (is_null($perfil->imagem))
                                <span class="bg-p-caixa__mensagem js-mensagem">@lang("messages.mensagem.semimagem")</span>
                            @endif
                            <a href="/arquivo/visualizar/perfil/{{$perfil->imagem}}" target="_blank"><img alt="{{$perfil->nome}}" class="bg-p-caixa__imagem js-imagem {{is_null($perfil->imagem) ? "is-hide" : ""}}" src="/arquivo/download/perfil/{{$perfil->imagem}}"></a>
                        </div>
                        <div class="bg-p-caixa__rodape">
                            <a class="bg-p-caixa__acao" href="#" onclick="buscarImagem(this, event)"><i class="icon-upload"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="l-row" role="row">
                <div class="u-grid--12" role="grid">
                    <label class="o-form__text" for="perfil">@lang("messages.label.descricao")</label>
                    <textarea class="o-form__data" id="perfil" name="descricao">{{$perfil->descricao}}</textarea>
                </div>
            </div>
            <div class="l-row" role="row">
                <div class="u-grid--12" role="grid">
                    <label class="o-form__text" for="inativo">@lang("messages.label.inativo")</label>
                    <input {{$perfil->inativo ? "checked" : ""}} class="o-mark__data--checkbox" id="inativo" name="inativo" type="hidden" value="{{$perfil->inativo}}">
                    <label class="o-mark__text"><span class="o-mark__element" data-marked="1" data-unmarked="0" onclick="MarkController.mark(this);"></span></label>
                </div>
            </div>
        </section>
    </form>
@stop
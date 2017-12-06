@extends("painel.config.pagina")
@section("pagina", "Dashboard - Meu Perfil")
@section("conteudo")
    <form action="/painel/dashboard/meu/perfil/atualizar" class="o-form" enctype="multipart/form-data" id="formmeuperfil" method="POST" name="formmeuperfil" role="form">
        @if ($perfil->id != null)
            {{method_field("PUT")}}
        @endif
        <input aria-hidden="true" name="_token" type="hidden" value="{{csrf_token()}}"/>
        <input aria-hidden="true" name="id" type="hidden" value="{{$perfil->id}}"/>
        <input aria-hidden="true" name="idusuario" type="hidden" value="{{$perfil->idusuario}}"/>
        <input aria-hidden="true" name="grupo" type="hidden" value="{{$perfil->idgrupo}}"/>
        <input aria-hidden="true" name="inativo" type="hidden" value="{{$perfil->inativo}}"/>
        <input aria-hidden="true" name="imagem" type="hidden" value="{{$perfil->imagem}}"/>
        <input accept="image/jpg" aria-hidden="true" class="is-hide js-inputImagem" id="file" name="file" type="file"/>
        <div class="bg-p-dashboard__header">
            <div class="o-breadcrumb--arrow">
                <span class="o-breadcrumb__link"><a href="/painel/dashboard" role="link" title="@lang("messages.menu.dashboard")">@lang("messages.menu.dashboard")</a></span>
                <span class="o-breadcrumb__link"><a href="/painel/dashboard/meu/perfil" role="link" title="@lang("messages.menu.dashboard.meuperfil")">@lang("messages.menu.dashboard.meuperfil")</a></span>
            </div>
            <button class="o-button--tie o-button--medium" type="submit"><i class="icon-floppy"></i>@lang("messages.botao.atualizar")</button>
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
                        <div class="u-grid--6" role="grid">
                            <label class="o-form__text" for="email">@lang("messages.label.email")</label>
                            <input aria-required="true" class="o-form__data" id="email" maxlength="255" name="email" required type="email" value="{{$perfil->usuario->email}}">
                        </div>
                        <div class="u-grid--6" role="grid">
                            <label class="o-form__text" for="senha">@lang("messages.label.senha")</label>
                            <input aria-required="true" class="o-form__data" id="senha" maxlength="255" name="senha" required type="password" value="{{$perfil->usuario->senha}}">
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
        </section>
    </form>
@stop
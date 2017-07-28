@extends("painel.config.pagina")
@section("pagina", "Configurações - Aparência")
@section("conteudo")
    <form action="/painel/configuracoes/aparencia" class="o-form" id="formblogaparencia" method="POST" name="formblogaparencia" role="form">
        {{method_field("PUT")}}
        <input aria-hidden="true" name="_token" type="hidden" value="{{csrf_token()}}"/>
        <input aria-hidden="true" name="id" type="hidden" value="{{$aparencia->id}}"/> 
        <div class="bg-p-dashboard__header">
            <div class="o-breadcrumb--arrow">
                <span class="o-breadcrumb__link"><a href="/painel/configuracoes/geral" role="link" title="@lang("messages.menu.configuracoes")">@lang("messages.menu.configuracoes")</a></span>
                <span class="o-breadcrumb__link"><a class="is-inactive" href="/painel/configuracoes/geral" role="link" title="@lang("messages.menu.configuracoes.aparencia")">@lang("messages.menu.configuracoes.aparencia")</a></span>
            </div>
        </div>
        <section class="o-form__body o-form__body--padding">
            <div class="l-row" role="row">
                <div class="u-grid--6" role="grid">
                    <label class="o-form__text" for="idtemamenu">@lang("messages.label.temamenu")</label>
                    <input aria-hidden="true" {{is_null($aparencia->idtemamenu) ? "" : "checked"}} class="o-mark__data--radio" id="idtemamenu" name="idtemamenu" type="hidden" value="{{$aparencia->idtemamenu}}">
                    @foreach ($temas as $tema)
                        <label class="o-mark__text" for="idtemamenu">
                            <span class="o-mark__element" data-marked="{{$tema->id}}" onclick="MarkController.mark(this);"></span>
                            {{$tema->tema}}
                        </label>
                    @endforeach
                </div>
                <div class="u-grid--6" role="grid">
                    <label class="o-form__text" for="idtemaaside">@lang("messages.label.temaaside")</label>
                    <input aria-hidden="true" {{is_null($aparencia->idtemaaside) ? "" : "checked"}} class="o-mark__data--radio" id="idtemaaside" name="idtemaaside" type="hidden" value="{{$aparencia->idtemaaside}}">
                    @foreach ($temas as $tema)
                        <label class="o-mark__text" for="idtemaaside">
                            <span class="o-mark__element" data-marked="{{$tema->id}}" onclick="MarkController.mark(this);"></span>
                            {{$tema->tema}}
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="l-row" role="row">
                <div class="u-grid--6" role="grid">
                    <label class="o-form__text" for="idtemanavegacao">@lang("messages.label.temanavegacao")</label>
                    <input aria-hidden="true" {{is_null($aparencia->idtemanavegacao) ? "" : "checked"}} class="o-mark__data--radio" id="idtemanavegacao" name="idtemanavegacao" type="hidden" value="{{$aparencia->idtemanavegacao}}">
                    @foreach ($temas as $tema)
                        <label class="o-mark__text" for="idtemanavegacao">
                            <span class="o-mark__element" data-marked="{{$tema->id}}" onclick="MarkController.mark(this);"></span>
                            {{$tema->tema}}
                        </label>
                    @endforeach
                </div>
                <div class="u-grid--6" role="grid">
                    <label class="o-form__text" for="idtemaperfil">@lang("messages.label.temaperfil")</label>
                    <input aria-hidden="true" {{is_null($aparencia->idtemaperfil) ? "" : "checked"}} class="o-mark__data--radio" id="idtemaperfil" name="idtemaperfil" type="hidden" value="{{$aparencia->idtemaperfil}}">
                    @foreach ($temas as $tema)
                        <label class="o-mark__text" for="idtemaperfil">
                            <span class="o-mark__element" data-marked="{{$tema->id}}" onclick="MarkController.mark(this);"></span>
                            {{$tema->tema}}
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="l-row" role="row">
                <div class="u-grid--6" role="grid">
                    <label class="o-form__text" for="idtemanotificacao">@lang("messages.label.temanotificacao")</label>
                    <input aria-hidden="true" {{is_null($aparencia->idtemanotificacao) ? "" : "checked"}} class="o-mark__data--radio" id="idtemanotificacao" name="idtemanotificacao" type="hidden" value="{{$aparencia->idtemanotificacao}}">
                    @foreach ($temas as $tema)
                        <label class="o-mark__text" for="idtemanotificacao">
                            <span class="o-mark__element" data-marked="{{$tema->id}}" onclick="MarkController.mark(this);"></span>
                            {{$tema->tema}}
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="l-row is-right" role="row">
                <div class="u-grid--12" role="grid">
                    <button class="o-button--tie o-button--medium" type="submit"><i class="icon-arrows-cw"></i>@lang("messages.botao.atualizarconfiguracoes")</button>
                </div>
            </div> 
        </section> 
    </form>
@stop
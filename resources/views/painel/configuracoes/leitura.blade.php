@extends("painel.config.pagina")
@section("pagina", "Configurações - Leitura")
@section("conteudo")
    <form action="/painel/configuracoes/leitura" class="o-form" id="formblogparametros" method="POST" name="formblogparametros" role="form">
        {{method_field("PUT")}}
        <input aria-hidden="true" name="_token" type="hidden" value="{{csrf_token()}}"/>
        <input aria-hidden="true" name="id" type="hidden" value="{{$parametros->id}}"/> 
        <div class="bg-p-dashboard__header">
            <div class="o-breadcrumb--arrow">
                <span class="o-breadcrumb__link"><a href="/painel/configuracoes/geral" role="link" title="@lang("messages.menu.configuracoes")">@lang("messages.menu.configuracoes")</a></span>
                <span class="o-breadcrumb__link"><a class="is-inactive" href="/painel/configuracoes/leitura" role="link" title="@lang("messages.menu.configuracoes.leitura")">@lang("messages.menu.configuracoes.leitura")</a></span>
            </div>
        </div>
        <section class="o-form__body o-form__body--padding">
            <div class="l-row" role="row">
                <div class="u-grid--4" role="grid">
                    <label class="o-form__text" for="idformatodata">@lang("messages.label.formatodata")</label>
                    <input {{!is_null($parametros->idformatodata) ? "checked" : ""}} class="o-mark__data--radio" id="idformatodata" name="idformatodata" type="hidden" value="{{$parametros->idformatodata}}">
					@foreach ($formatosdata as $formato)
                        <label class="o-mark__text o-mark__text--block" for="idformatodata">
                            <span class="o-mark__element" data-marked="{{$formato->id}}" onclick="MarkController.mark(this);"></span>
                            {{$formato->descricao}}
                        </label>
                    @endforeach
                </div>
                <div class="u-grid--4" role="grid">
                    <label class="o-form__text" for="idformatohora">@lang("messages.label.formatohora")</label>
                    <input {{!is_null($parametros->idformatohora) ? "checked" : ""}} class="o-mark__data--radio" id="idformatohora" name="idformatohora" type="hidden" value="{{$parametros->idformatohora}}">
					@foreach ($formatoshora as $formato)
                        <label class="o-mark__text o-mark__text--block" for="idformatohora">
                            <span class="o-mark__element" data-marked="{{$formato->id}}" onclick="MarkController.mark(this);"></span>
                            {{$formato->descricao}}
                        </label>
                    @endforeach
                </div>
                <div class="u-grid--4" role="grid">
                    <label class="o-form__text" for="idformatodatahora">@lang("messages.label.formatodatahora")</label>
                    <input {{!is_null($parametros->idformatodatahora) ? "checked" : ""}} class="o-mark__data--radio" id="idformatodatahora" name="idformatodatahora" type="hidden" value="{{$parametros->idformatodatahora}}">
					@foreach ($formatosdatahora as $formato)
                        <label class="o-mark__text o-mark__text--block" for="idformatodatahora">
                            <span class="o-mark__element" data-marked="{{$formato->id}}" onclick="MarkController.mark(this);"></span>
                            {{$formato->descricao}}
                        </label>
                    @endforeach
                </div>
            </div> 
            <div class="l-row" role="row">
                <div class="u-grid--12" role="grid">
                    <label class="o-form__text" for="idtipovisualizacaopostsrelacionados">@lang("messages.label.tipovisualizacaopostsrelacionados")</label>
                    <select aria-required="true" class="o-form__data" id="idtipovisualizacaopostsrelacionados" name="idtipovisualizacaopostsrelacionados" required>
                        @foreach ($tiposvisualizacao as $tipo)
                            <option {{$parametros->idtipovisualizacaopostsrelacionados == $tipo->id ? "selected" : ""}} value="{{$tipo->id}}">{{$tipo->descricao}}</option>
                        @endforeach
                    </select>
                </div>
            </div>  
            <div class="l-row" role="row">
                <div class="u-grid--12" role="grid">
                    <label class="o-form__text" for="quantidadepostsporpagina">@lang("messages.label.quantidadepostsporpagina")</label>
                    <input aria-required="true" class="o-form__data" id="quantidadepostsporpagina" max="20" min="0" name="quantidadepostsporpagina" required step="1" type="number" value="{{$parametros->quantidadepostsporpagina}}">
                </div>
            </div>
            <div class="l-row" role="row">
                <div class="u-grid--12" role="grid">
                    <label class="o-form__text" for="mostrarpostsrelacionados">@lang("messages.label.mostrarpostsrelacionados")</label>
                    <input {{$parametros->mostrarpostsrelacionados ? "checked" : ""}} class="o-mark__data--checkbox" id="mostrarpostsrelacionados" name="mostrarpostsrelacionados" type="hidden" value="{{$parametros->mostrarpostsrelacionados}}">
					<label class="o-mark__text"><span class="o-mark__element" data-marked="1" data-unmarked="0" onclick="MarkController.mark(this);"></span></label>
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
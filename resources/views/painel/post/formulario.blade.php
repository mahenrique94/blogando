@extends("painel.config.pagina")
@section("pagina", "Posts - Formulário")
@section("conteudo")
    <div class="l-row" role="row">
        <div class="u-grid--9" role="grid">
            <form action="/painel/post" class="o-form" enctype="multipart/form-data" id="formpost" method="POST" name="formpost" onsubmit="LoadingController.insertInBody()" role="form">
                @if ($post->id != null)
                    {{method_field("PUT")}}
                @endif
                <input aria-hidden="true" name="_token" type="hidden" value="{{csrf_token()}}"/>
                <input aria-hidden="true" name="id" type="hidden" value="{{$post->id}}"/>
                <input aria-hidden="true" name="idperfil" type="hidden" value="{{$post->idperfil}}"/>
                <input aria-hidden="true" name="idsituacao" type="hidden" value="{{$post->idsituacao}}"/>
                <input aria-hidden="true" name="slug" type="hidden" value="{{$post->slug}}"/>
                <input aria-hidden="true" name="datapostagem" type="hidden" value="{{$post->datapostagem}}"/>
                <input aria-hidden="true" name="imagem" type="hidden" value="{{$post->imagem}}"/>
                <input accept="image/jpg" aria-hidden="true" class="is-hide js-inputImagem" id="file" name="file" type="file"/>
                <div class="bg-p-dashboard__header">
                    <div class="o-breadcrumb--arrow">
                        <span class="o-breadcrumb__link"><a href="/painel/post" role="link" title="@lang("messages.menu.post")">@lang("messages.menu.post")</a></span>
                        <span class="o-breadcrumb__link"><a class="is-inactive" href="/painel/post/formulario" role="link" title="@lang("messages.menu.post.novo")">@lang("messages.menu.post.novo")</a></span>
                    </div>
                    <a class="o-button--tie o-button--medium" href="/painel/post/formulario"><i class="icon-plus"></i>@lang("messages.botao.novo")</a>
                    <button class="o-button--tie o-button--medium" type="submit"><i class="icon-floppy"></i>@lang("messages.botao.salvar")</button>
                    @if (is_null($post->id))
                        <button formaction="/painel/post/rascunho" class="o-button--tie o-button--medium" type="submit"><i class="icon-pencil"></i>@lang("messages.botao.salvar.rascunho")</button>
                    @endif
                    @if (!is_null($post->id) && $post->idsituacao != \App\Http\Parametros::SITUACAOPOST_PUBLICADO)
                        <button formaction="/painel/post/publicar" class="o-button--tie o-button--medium" type="submit"><i class="icon-globe"></i>@lang("messages.botao.publicar")</button>
                    @endif
                    <a class="o-button--tie o-button--medium" href="/painel/post"><i class="icon-search"></i>@lang("messages.botao.pesquisar")</a>
                    @if (!is_null($post->id) && $post->idsituacao != \App\Http\Parametros::SITUACAOPOST_PUBLICADO)
                        <a class="o-button--tie o-button--medium" href="/painel/post/pre-visualizar/{{$post->idsituacao}}/{{$post->slug}}"><i class="icon-eye"></i>@lang("messages.botao.previsualizar")</a>
                    @endif
                    @if ($post->idsituacao == \App\Http\Parametros::SITUACAOPOST_PUBLICADO)
                        <a class="o-button--tie o-button--medium" href="/{{$post->slug}}"><i class="icon-eye"></i>@lang("messages.botao.visualizar")</a>
                    @endif
                </div>
                <section class="o-form__body o-form__body--padding">
                    <div class="l-row" role="row">
                        <div class="u-grid--12" role="grid">
                            <label class="o-form__text" for="titulo">@lang("messages.label.titulo")</label>
                            <input {{$post->id != null ? "" : "autofocus"}} aria-required="true" class="o-form__data" id="titulo" maxlength="120" name="titulo" required type="text" value="{{$post->titulo}}">
                        </div>
                    </div>
                    <div class="l-row" role="row">
                        <div class="u-grid--12" role="grid">
                            <textarea aria-required="true" class="o-form__data" id="conteudo" name="conteudo">{{$blog->parametros->usarmarkdown ? $post->conteudomarkdown : $post->conteudohtml}}</textarea>
                        </div>
                    </div>
                </section> 
            </form>
        </div>
        <div class="u-grid--3" role="grid">
            <div class="bg-p-caixa">
                <div class="bg-p-caixa__cabecalho">@lang("messages.caixa.informacoes")</div>
                <div class="bg-p-caixa__corpo">
                    <div class="l-row" role="row">
                        <div class="u-grid--12" role="grid">
                            <label class="o-form__text o-form__text--inline" for="situacao">@lang("messages.label.situacao"):</label>
                            @if (!is_null($post->situacao))
                                <span>{{$post->situacao->descricao}}</span>
                            @else
                                Em andamento
                            @endif
                        </div>
                    </div>
                    <div class="l-row" role="row">
                        <div class="u-grid--12" role="grid">
                            <label class="o-form__text o-form__text--inline" for="publicadoem">@lang("messages.label.publicadoem"):</label>
                            <span>{{date_format(date_create($post->datapostagem), "d/m/Y")}}</span>
                        </div>
                    </div>
                    <div class="l-row" role="row">
                        <div class="u-grid--12" role="grid">
                            <label class="o-form__text o-form__text--inline" for="as">@lang("messages.label.as"):</label>
                            <span>{{date_format(date_create($post->datapostagem), "H:i")}}</span>
                        </div>
                    </div>
                    <div class="l-row" role="row">
                        <div class="u-grid--12 no-margin" role="grid">
                            <label class="o-form__text o-form__text--inline" for="publicadopor">@lang("messages.label.por"):</label>
                            @if (!is_null($post->perfil))
                                <span>{{$post->perfil->nome}}</span>
                            @else
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-p-caixa">
                <div class="bg-p-caixa__cabecalho">@lang("messages.caixa.imagempost")</div>
                <div class="bg-p-caixa__corpo">
                    @if (is_null($post->imagem))
                        <span class="bg-p-caixa__mensagem js-mensagem">@lang("messages.mensagem.semimagem")</span>
                    @endif
                    <a href="/arquivo/visualizar/posts/{{date_format(date_create($post->datapostagem), "Y")}}/{{date_format(date_create($post->datapostagem), "m")}}/{{$post->imagem}}" target="_blank"><img alt="{{$post->titulo}}" class="bg-p-caixa__imagem js-imagem {{is_null($post->imagem) ? "is-hide" : ""}}" src="/arquivo/download/posts/{{date_format(date_create($post->datapostagem), "Y")}}/{{date_format(date_create($post->datapostagem), "m")}}/{{$post->imagem}}"></a>
                </div>
                <div class="bg-p-caixa__rodape">
                    <a class="bg-p-caixa__acao" href="#" onclick="buscarImagem(this, event)"><i class="icon-upload"></i></a>
                </div>
            </div>
            <div class="bg-p-caixa {{is_null($post->id) ? "is-hide" : ""}}">
                <div class="bg-p-caixa__cabecalho">@lang("messages.caixa.categorias")</div>
                <div class="bg-p-caixa__corpo">
                    <select class="bg-p-caixa__select js-select is-hide" id="categorias" name="categorias">
                        <option value="">Selecione uma categoria</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{$categoria->id}}">{{$categoria->descricao}}</option>
                        @endforeach
                    </select>
                    @if (count($post->categorias) <= 0)
                        <span class="bg-p-caixa__mensagem js-mensagem">@lang("messages.mensagem.semcategoria")</span>
                    @else
                        <ul class="bg-p-caixa__lista js-lista">
                            @foreach ($post->categorias as $categoria)
                                <li class="bg-p-caixa__item js-item">{{$categoria->categoria->descricao}}<span><button class="bg-p-caixa__acao" formaction="/painel/post/categoria/{{$categoria->id}}" onclick="DialogController.build(event, this, requestDelete, 'Deseja confirmar a exclusao', 'icon-trash');" role="button" type="button" style="float: right;" title="@lang("messages.botao.deletar")"><i class="icon-minus bg-p-caixa__icone"></i></button></span></li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="bg-p-caixa__rodape">
                    <a class="bg-p-caixa__acao" href="#" onclick="mostrarSelect(this, event);"><i class="icon-plus"></i></a>
                    <div class="bg-p-caixa__opcoes is-hide">
                        <button class="bg-p-caixa__acao" form="formpost" formaction="/painel/post/categoria" formmethod="post" onclick="salvarCaixa(this, 'categorias', event);" type="button"><i class="icon-ok"></i></button>
                        <a class="bg-p-caixa__acao" href="#" onclick="esconderSelect(this, event);"><i class="icon-cancel"></i></a>
                    </div>
                </div>
            </div>
            <div class="bg-p-caixa {{is_null($post->id) ? "is-hide" : ""}}">
                <div class="bg-p-caixa__cabecalho">@lang("messages.caixa.tags")</div>
                <div class="bg-p-caixa__corpo">
                    <select class="bg-p-caixa__select js-select is-hide" id="tags" name="tags">
                        <option value="">Selecione uma tag</option>
                        @foreach ($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->descricao}}</option>
                        @endforeach
                    </select>
                    @if (count($post->tags) <= 0)
                        <span class="bg-p-caixa__mensagem js-mensagem">@lang("messages.mensagem.semtag")</span>
                    @else
                        <ul class="bg-p-caixa__lista js-lista">
                            @foreach ($post->tags as $tag)
                                <li class="bg-p-caixa__item js-item">{{$tag->tag->descricao}}<span><button class="bg-p-caixa__acao" formaction="/painel/post/tag/{{$tag->id}}" onclick="DialogController.build(event, this, requestDelete, 'Deseja confirmar a exclusao', 'icon-trash');" role="button" type="button" style="float: right;" title="@lang("messages.botao.deletar")"><i class="icon-minus bg-p-caixa__icone"></i></button></span></li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="bg-p-caixa__rodape">
                    <a class="bg-p-caixa__acao" href="#" onclick="mostrarSelect(this, event);"><i class="icon-plus"></i></a>
                    <div class="bg-p-caixa__opcoes is-hide">
                        <button class="bg-p-caixa__acao" form="formpost" formaction="/painel/post/tag" formmethod="post" onclick="salvarCaixa(this, 'tags', event);" type="button"><i class="icon-ok"></i></button>
                        <a class="bg-p-caixa__acao" href="#" onclick="esconderSelect(this, event);"><i class="icon-cancel"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
<div class="bg-comentarios">
    <h3 class="bg-comentarios__titulo">
        @if (count($postcomentarios) == 1)
            {{count($postcomentarios)}} Comentário
        @elseif (count($postcomentarios) > 1)
            {{count($postcomentarios)}} Comentários
        @else
            Comentários
        @endif
    </h3>
    @foreach($postcomentarios as $comentario)
        @if (is_null($comentario->idcomentario))
            <div class="bg-comentarios__comentario">
                @unless (Auth::guest())
                    <a class="bg-post__editar o-button--tie o-button--medium" href="/painel/comentario/{{$comentario->id}}"><i class="icon-pencil"></i>@lang("messages.botao.editar")</a>
                @endunless
                <img alt="{{$comentario->nome}}" class="bg-comentarios__comentario___foto" src="/arquivo/download/usuarios/{{$comentario->autor->imagem}}">
                <div class="bg-comentarios__comentario___corpo">
                    <h4 class="bg-comentarios__comentario___nome">{{$comentario->nome}}</h4>
                    <small class="bg-comentarios__comentario___email">{{$comentario->email}}</small>
                    <p class="bg-comentarios__comentario___descricao">{{$comentario->comentario}}</p>
                    <time class="bg-comentarios__comentario___data">{{date_format(date_create($comentario->created_at), "d/m/Y H:i")}}</time>
                </div>
                @if (count($comentario->comentarios) > 0)
                    <div class="bg-comentarios__respostas">
                        @foreach($comentario->comentarios as $resposta)
                            <div class="bg-comentarios__comentario bg-comentarios__comentario--resposta">
                                @unless (Auth::guest())
                                    <a class="bg-post__editar o-button--tie o-button--medium" href="/painel/comentario/{{$resposta->id}}"><i class="icon-pencil"></i>@lang("messages.botao.editar")</a>
                                @endunless
                                <img alt="{{$resposta->nome}}" class="bg-comentarios__comentario___foto" src="/arquivo/download/usuarios/{{$resposta->autor->imagem}}">
                                <div class="bg-comentarios__comentario___corpo">
                                    <h4 class="bg-comentarios__comentario___nome">{{$resposta->nome}}</h4>
                                    <small class="bg-comentarios__comentario___email">{{$resposta->email}}</small>
                                    <p class="bg-comentarios__comentario___descricao">{{$resposta->comentario}}</p>
                                    <time class="bg-comentarios__comentario___data">{{date_format(date_create($resposta->created_at), "d/m/Y H:i")}}</time>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
                <a class="bg-comentarios__comentario___responder" data-comentario="{{$comentario->id}}" href="#formpostcomentario" onclick="responderComentario(this);"><i class="icon-reply"></i>&nbsp;Responder</a>
            </div>
        @endif
    @endforeach
    <form action="/comentario" class="bg-comentarios__formulario o-form" id="formpostcomentario" name="formpostcomentario" method="post">
        <input aria-hidden="true" name="_token" type="hidden" value="{{csrf_token()}}"/>
        <input aria-hidden="true" name="idpost" type="hidden" value="{{$post->id}}"/>
        <input aria-hidden="true" name="idautor" type="hidden" value="{{Auth::guest() ? null : Auth::id()}}"/>
        <input aria-hidden="true" name="idcomentario" type="hidden" value=""/>
        <h3 class="bg-comentarios__formulario___titulo">
            @if (count($postcomentarios) > 0)
                Deixe o seu comentário
            @else
                Seja o primeiro a comentar
            @endif
        </h3>
        <section class="o-form__body o-form__body--padding">
            <div class="l-row" role="row">
                <div class="u-grid--6" role="grid">
                    <label class="o-form__text" for="nome">@lang("messages.label.nome")</label>
                    <input aria-required="true" class="o-form__data" id="nome" maxlength="120" name="nome" required type="text" value="{{Auth::guest() ? "" : Auth::user()->nome}}">
                </div>
                <div class="u-grid--6" role="grid">
                    <label class="o-form__text" for="email">@lang("messages.label.email")</label>
                    <input aria-required="true" class="o-form__data" id="email" maxlength="255" name="email" required type="email" value="{{Auth::guest() ? "" : Auth::user()->email}}">
                </div>
            </div>
            <div class="l-row" role="row">
                <div class="u-grid--12" role="grid">
                    <label class="o-form__text" for="comentario">@lang("messages.label.comentario")</label>
                    <textarea aria-required="true" class="o-form__data" id="comentario" name="comentario" required></textarea>
                </div>
            </div>
            <div class="l-row" role="row">
                <div class="u-grid--6" role="grid">
                    <label class="o-form__text" for="avisarnovoscomentarios">@lang("messages.label.avisarnovoscomentarios")</label>
                    <input class="o-mark__data--checkbox" id="avisarnovoscomentarios" name="avisarnovoscomentarios" type="hidden" value="0">
                    <label class="o-mark__text"><span class="o-mark__element" data-marked="1" data-unmarked="0" onclick="MarkController.mark(this);"></span></label>
                </div>
                <div class="u-grid--6" role="grid">
                    <label class="o-form__text" for="avisarrespostas">@lang("messages.label.avisarrespostas")</label>
                    <input class="o-mark__data--checkbox" id="avisarrespostas" name="avisarrespostas" type="hidden" value="0">
                    <label class="o-mark__text"><span class="o-mark__element" data-marked="1" data-unmarked="0" onclick="MarkController.mark(this);"></span></label>
                </div>
            </div>
            <div class="l-row is-right" role="row">
                <div class="u-grid--12" role="grid">
                    <button class="o-button--tie o-button--medium" type="submit"><i class="icon-comment"></i>@lang("messages.botao.comentar")</button>
                </div>
            </div>
        </section>
    </form>
</div>

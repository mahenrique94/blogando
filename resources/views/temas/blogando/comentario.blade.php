<div class="bg-comentarios">
    <h3 class="bg-comentarios__titulo">Comentários</h3>
    @foreach($comentarios as $comentario)
        {{$comentario->comentario}}
    @endforeach
    <form action="/comentario" class="bg-comentarios__formulario o-form" id="formpostcomentario" name="formpostcomentario" method="post">
        <input aria-hidden="true" name="_token" type="hidden" value="{{csrf_token()}}"/>
        <input aria-hidden="true" name="idpost" type="hidden" value="{{$post->id}}"/>
        <h3 class="bg-comentarios__formulario___titulo">Deixe o seu comentário</h3>
        <section class="o-form__body o-form__body--padding">
            <div class="l-row" role="row">
                <div class="u-grid--6" role="grid">
                    <label class="o-form__text" for="nome">@lang("messages.label.nome")</label>
                    <input aria-required="true" class="o-form__data" id="nome" maxlength="120" name="nome" required type="text" value="">
                </div>
                <div class="u-grid--6" role="grid">
                    <label class="o-form__text" for="email">@lang("messages.label.email")</label>
                    <input aria-required="true" class="o-form__data" id="email" maxlength="255" name="email" required type="email" value="">
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

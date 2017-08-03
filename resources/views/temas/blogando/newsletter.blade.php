<div class="bg-aside__caixa">
    <h3 class="bg-aside__titulo">@lang("messages.caixa.newsletter")</h3>
    <p class="bg-aside__descricao">@lang("messages.descricao.newsletter")</p>
    <form action="/newsletter/assinar" class="o-form" method="post" onsubmit="assinarNewsletter(this, event);">
        <section class="o-form__body">
            <div class="l-row" role="row">
                <div class="u-grid--12" role="grid">
                    <div class="o-form__group">
                        <input aria-required="true" class="o-form__data no-margin" maxlength="255" name="email" placeholder="@lang("messages.placeholder.emailnewsletter")" required type="email">
                        <span class="o-form__groupElement"><label class="o-button--tie"><i class="icon-mail"></i></label></span>
                    </div>
                </div>
            </div>
            <div class="l-row" role="row">
                <div class="u-grid--12" role="grid">
                    <button class="o-button--tie o-button--medium is-right" role="button" title="@lang("messages.botao.assinar")" type="submit"><i class="icon-pencil"></i>&nbsp;@lang("messages.botao.assinar")</button>
                </div>
            </div>
        </section>
    </form>
</div>
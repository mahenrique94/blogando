<div class="bg-aside__caixa bg-aside__caixa--newsletter">
    <h3 class="bg-aside__titulo">@lang("messages.caixa.newsletter")</h3>
    <div class="bg-aside__corpo">
        <p class="bg-aside__descricao">@lang("messages.descricao.newsletter")</p>
        <form action="/newsletter/assinar" class="bg-newsletter o-form" method="post" onsubmit="assinarNewsletter(this, event);">
            <section class="o-form__body">
                <div class="l-row" role="row">
                    <div class="u-grid--12" role="grid">
                        <div class="o-form__iconed">
                            <input aria-required="true" class="bg-newsletter__data o-form__data no-margin" maxlength="255" name="email" placeholder="@lang("messages.placeholder.emailnewsletter")" required type="email">
                            <span class="o-form__icon"><i class="icon-mail"></i></span>
                        </div>
                    </div>
                </div>
                <div class="l-row" role="row">
                    <div class="u-grid--12 no-margin" role="grid">
                        <button class="bg-aside__button o-button--rup o-button--medium is-right" role="button" title="@lang("messages.botao.assinar")" type="submit"><i class="icon-pencil"></i>&nbsp;@lang("messages.botao.assinar")</button>
                    </div>
                </div>
            </section>
        </form>
    </div>
</div>
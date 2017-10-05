<div class="bg-aside__caixa bg-aside__caixa--redessociais">
    <h3 class="bg-aside__titulo">@lang("messages.caixa.pesquisar")</h3>
    <form action="/procurar" class="bg-pesquisar o-form" id="formpesquisarpost" method="get" name="formpesquisarpost">
        <div class="o-form__group">
            <input aria-required="true" class="o-form__data bg-pesquisar__data" id="filtro" name="filtro" placeholder="Procurar por um post" required type="search" value="{{isset($filtro) && !is_null($filtro) && !empty($filtro) ? $filtro : null}}">
            <span class="o-form__groupElement"><button class="o-button--gary"><i class="icon-search"></i></button></span>
        </div>
    </form>
</div>
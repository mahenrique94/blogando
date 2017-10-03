<form action="/procurar" class="bg-pesquisar o-form" id="formpesquisarpost" method="get" name="formpesquisarpost">
    <div class="o-form__iconed">
        <input aria-required="true" class="o-form__data bg-pesquisar__data" id="filtro" name="filtro" placeholder="Procurar por uma notícia" required type="search" value="{{isset($filtro) && !is_null($filtro) && !empty($filtro) ? $filtro : null}}">
        <span class="o-form__icon"><i class="icon-search"></i></span>
    </div>
    <small class="bg-pesquisar__exemplo">Ex: Game of Thrones, Fifa, Deadpool...</small>
</form>
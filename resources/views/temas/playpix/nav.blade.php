<nav class="bg-nav">
    <ul class="bg-nav__lista">
        @foreach ($categorias->all() as $categoria)
            <li class="bg-nav__item"><a class="bg-nav__link bg-{{$categoria->slug}} {{isset($categoriafiltrada) && !is_null($categoriafiltrada) && !empty($categoriafiltrada) && $categoria->descricao === $categoriafiltrada->descricao ? "is-ativo" : ""}}" href="/categoria/{{$categoria->slug}}">{{$categoria->descricao}}</a></li>
        @endforeach
    </ul>
</nav>
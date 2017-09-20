<nav class="bg-nav">
    <ul class="bg-nav__lista">
        @foreach ($categorias->all() as $categoria)
            <li class="bg-nav__item"><a class="bg-nav__link bg-{{$categoria->slug}}" href="/categoria/{{$categoria->slug}}">{{$categoria->descricao}}</a></li>
        @endforeach
    </ul>
</nav>
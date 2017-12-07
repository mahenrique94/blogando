<nav class="bg-nav">
    <ul class="bg-nav__lista">
        @foreach ($categorias->all() as $categoria)
            <li class="bg-nav__item"><a class="bg-nav__link bg-{{$categoria->slug}} {{isset($categoriafiltrada) && !is_null($categoriafiltrada) && !empty($categoriafiltrada) && $categoria->descricao === $categoriafiltrada->descricao ? "is-ativo" : ""}}" href="/categoria/{{$categoria->slug}}">{{$categoria->descricao}}</a></li>
        @endforeach
    </ul>
    <ul class="bg-nav__lista--conta">
        @if (Auth::guest())
            <li class="bg-nav__item--conta"><a class="bg-nav__link--conta" href="javascript:void(0)"><i class="icon-user bg-nav__icone--conta"></i>Minha conta</a>
        @else
            <li class="bg-nav__item--conta"><a class="bg-nav__link--conta" href="javascript:void(0)"><i class="icon-user bg-nav__icone--conta"></i>Ola, seja bem vindo {{Auth::user()->nome}}</a>
        @endif
            <ul class="bg-nav__lista--conta bg-nav__lista--segundoNivel">
                @if (Auth::guest())
                    <li class="bg-nav__item--conta bg-nav__item--conta---segundoNivel"><a class="bg-nav__link--conta bg-nav__link--conta---segundoNivel" href="/painel"><i class="icon-login bg-nav__icone--conta"></i>Acessar</a></li>
                    <li class="bg-nav__item--conta bg-nav__item--conta---segundoNivel"><a class="bg-nav__link--conta bg-nav__link--conta---segundoNivel" href="/painel/nova/conta"><i class="icon-user-plus bg-nav__icone--conta"></i>Registrar</a></li>
                @endif
                @if (!Auth::guest())
                        <li class="bg-nav__item--conta bg-nav__item--conta---segundoNivel"><a class="bg-nav__link--conta bg-nav__link--conta---segundoNivel" href="/painel"><i class="icon-gauge bg-nav__icone--conta"></i>Painel</a></li>
                        <li class="bg-nav__item--conta bg-nav__item--conta---segundoNivel"><a class="bg-nav__link--conta bg-nav__link--conta---segundoNivel" href="/painel/sair"><i class="icon-logout bg-nav__icone--conta"></i>Sair</a></li>
                @endif
            </ul>
        </li>
    </ul>
</nav>
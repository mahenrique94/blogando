@section("header")
    <div class="bg-header--container">
        <button class="bg-toggleNav" onclick="toggleNav(event);" type="button"><i class="icon-menu"></i></button>
        <h1 class="bg-titulo">
            <a href="/">
                <img alt="{{$blog->titulo}}" class="bg-logo" src="/assets/temas/{{$blog->aparencia->temablog}}/{{$blog->aparencia->temablog}}.png">
            </a>
        </h1>
        @if ($blog->aparencia->mostrarpesquisa)
            @include("temas.playpix.pesquisar")
        @endif
        @include("temas.playpix.nav")
    </div>
@stop
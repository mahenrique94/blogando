@section("header")
    <div class="bg-header--container">
        <h1 class="bg-titulo">
            <a href="/">
                <img alt="{{$blog->titulo}}" class="bg-logo" src="/assets/temas/{{$blog->aparencia->temablog}}/{{$blog->aparencia->temablog}}.png">
            </a>
        </h1>
        @include("temas.playpix.pesquisar")
        @include("temas.playpix.nav")
    </div>
@stop
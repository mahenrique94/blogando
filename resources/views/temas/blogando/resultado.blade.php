@if (isset($filtro) && !is_null($filtro) && !empty($filtro))
    @if (count($posts) > 0)
        @if (count($posts) > 1)
            <p class="bg-resultado">Foram encontrados <strong>{{$resultado}}</strong> posts para o título <strong>{{$filtro}}</strong>.</p>
        @else
            <p class="bg-resultado">Foi encontrado <strong>{{$resultado}}</strong> post para o título <strong>{{$filtro}}</strong>.</p>
        @endif
    @else
        <p class="bg-resultado">Não há posts para o título <strong>{{$filtro}}</strong>.</p>
    @endif
@endif

@if (isset($mes) && !is_null($mes) && !empty($mes) && isset($ano) && !is_null($ano) && !empty($ano))
    @if (count($posts) > 0)
        @if (count($posts) > 1)
            <p class="bg-resultado">Foram encontrados <strong>{{$resultado}}</strong> posts o mês <strong>{{$mes}}</strong> do ano <strong>{{$ano}}</strong>.</p>
        @else
            <p class="bg-resultado">Foi encontrado <strong>{{$resultado}}</strong> post o mês <strong>{{$mes}}</strong> do ano <strong>{{$ano}}</strong>.</p>
        @endif
    @else
        <p class="bg-resultado">Não há posts para o mês <strong>{{$mes}}</strong> do ano <strong>{{$ano}}</strong>.</p>
    @endif
@endif

@if (isset($categoria) && !is_null($categoria) && !empty($categoria))
    @if (count($posts) > 0)
        @if (count($posts) > 1)
            <p class="bg-resultado">Foram encontrados <strong>{{$resultado}}</strong> posts para a categoria <strong>{{$categoria->descricao}}</strong>.</p>
        @else
            <p class="bg-resultado">Foi encontrado <strong>{{$resultado}}</strong> post para a categoria <strong>{{$categoria->descricao}}</strong>.</p>
        @endif
    @else
        <p class="bg-resultado">Não há posts para a categoria <strong>{{$categoria->descricao}}</strong>.</p>
    @endif
@endif

@if (isset($tag) && !is_null($tag) && !empty($tag))
    @if (count($posts) > 0)
        @if (count($posts) > 1)
            <p class="bg-resultado">Foram encontrados <strong>{{$resultado}}</strong> posts para a tag <strong>{{$tag->descricao}}</strong>.</p>
        @else
            <p class="bg-resultado">Foi encontrado <strong>{{$resultado}}</strong> post para a tag <strong>{{$tag->descricao}}</strong>.</p>
        @endif
    @else
        <p class="bg-resultado">Não há posts para a tag <strong>{{$tag->descricao}}</strong>.</p>
    @endif
@endif

@if (isset($autor) && !is_null($autor) && !empty($autor))
    @if (count($posts) > 0)
        @if (count($posts) > 1)
            <p class="bg-resultado">Foram encontrados <strong>{{$resultado}}</strong> posts para o autor <strong>{{$autor->nome}}</strong>.</p>
        @else
            <p class="bg-resultado">Foi encontrado <strong>{{$resultado}}</strong> post para o autor <strong>{{$autor->nome}}</strong>.</p>
        @endif
    @else
        <p class="bg-resultado">Não há posts para o autor <strong>{{$autor->nome}}</strong>.</p>
    @endif
@endif
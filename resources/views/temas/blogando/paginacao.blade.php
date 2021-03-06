@if (!empty($posts) && count($posts) > 0)
    <div class="bg-paginacao">
        <ul class="bg-paginacao__paginas">
            @if ($paginaAtual > 1)
                <li class="bg-paginacao__pagina"><a class="bg-paginacao__link bg-paginacao__link--primeira" href="{{$link}}/pagina/1{{$metodo === "procurar" ? "?filtro=" . $filtro : ""}}"></a></li>
                <li class="bg-paginacao__pagina"><a class="bg-paginacao__link bg-paginacao__link--anterior" href="{{$link}}/pagina/{{($paginaAtual - 1) >= 1 ? $paginaAtual - 1 : 1}}{{$metodo === "procurar" ? "?filtro=" . $filtro : ""}}"></a></li>
            @endif
            @for ($i = ($paginaAtual > 1 ? ($paginaAtual + 5 > $paginas ? ($paginas - 4 < 0 ? $paginaAtual : ($paginas - 4 == 0 ? 1 : $paginas - 4)) : $paginaAtual) : $paginaAtual), $j = 1; $i <= $paginas && $j <= 5; $i++, $j++)
                <li class="bg-paginacao__pagina"><a class="bg-paginacao__link {{$paginaAtual == $i ? "is-ativo" : ""}}" href="{{$link}}/pagina/{{$i}}{{$metodo === "procurar" ? "?filtro=" . $filtro : ""}}">{{$i}}</a></li>
            @endfor
            @if ($paginaAtual < $paginas)
                <li class="bg-paginacao__pagina"><a class="bg-paginacao__link bg-paginacao__link--proxima" href="{{$link}}/pagina/{{($paginaAtual + 1) <= $paginas ? ($paginaAtual + 1) : $paginas}}{{$metodo === "procurar" ? "?filtro=" . $filtro : ""}}"></a></li>
                <li class="bg-paginacao__pagina"><a class="bg-paginacao__link bg-paginacao__link--ultima" href="{{$link}}/pagina/{{$paginas}}{{$metodo === "procurar" ? "?filtro=" . $filtro : ""}}"></a></li>
            @endif
        </ul>
    </div>
@endif
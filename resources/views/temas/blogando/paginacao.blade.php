<div class="bg-paginacao">
    <ul class="bg-paginacao__paginas">
        @if ($pagina > 1)
            <li class="bg-paginacao__pagina"><a class="bg-paginacao__link bg-paginacao__link--primeira" href="/pagina/1"></a></li>
            <li class="bg-paginacao__pagina"><a class="bg-paginacao__link bg-paginacao__link--anterior" href="/pagina/{{($pagina - 1) >= 1 ? $pagina - 1 : 1}}"></a></li>
        @endif
        @for ($i = 1; $i <= $paginas; $i++)
            <li class="bg-paginacao__pagina"><a class="bg-paginacao__link {{$pagina == $i ? "is-ativo" : ""}}" href="/pagina/{{$i}}">{{$i}}</a></li>
        @endfor
        @if ($pagina < $paginas)
            <li class="bg-paginacao__pagina"><a class="bg-paginacao__link bg-paginacao__link--proxima" href="/pagina/{{($pagina + 1) <= $paginas ? ($pagina + 1) : $paginas}}"></a></li>
            <li class="bg-paginacao__pagina"><a class="bg-paginacao__link bg-paginacao__link--ultima" href="/pagina/{{$paginas}}"></a></li>
        @endif
    </ul>
</div>
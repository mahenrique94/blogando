<div class="bg-aside__caixa bg-aside__caixa--postsrecentes">
    <h3 class="bg-aside__titulo">Últimas notícias</h3>
    <div class="bg-aside__corpo">
        <ul class="bg-aside__lista bg-aside__lista--postsrecentes">
            @foreach ($postsrecentes as $post)
                <li class="bg-aside__item">
                    <span class="bg-aside__indice">{{$loop->index + 1}}</span>
                    <a class="bg-aside__link" href="/{{$post->slug}}">{{$post->titulo}}</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
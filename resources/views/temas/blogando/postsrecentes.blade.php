<div class="bg-aside__caixa bg-aside__caixa--postsrecentes">
    <h3 class="bg-aside__titulo">@lang("messages.caixa.postsrecentes")</h3>
    <div class="bg-aside__corpo">
        <ul class="bg-aside__lista bg-aside__lista--postsrecentes">
            @foreach ($postsrecentes as $post)
                <li class="bg-aside__item"><a class="bg-aside__link" href="/{{$post->slug}}">{{$post->titulo}}</a></li>
            @endforeach
        </ul>
    </div>
</div>
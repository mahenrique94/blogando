<div class="bg-aside__caixa">
    <h3 class="bg-aside__titulo">@lang("messages.caixa.postsrecentes")</h3>
    <ul class="bg-aside__lista">
        @foreach ($postsrecentes as $post)                
            <li class="bg-aside__item"><a class="bg-aside__link" href="/{{$post->slug}}">{{$post->titulo}}</a></li>
        @endforeach
    </ul>
</div>
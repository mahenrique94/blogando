<div class="bg-aside__caixa">
    <h3 class="bg-aside__titulo">@lang("messages.caixa.tags")</h3>
    @foreach ($tags as $tag)                
        <a class="bg-post__tag" href="/tag/{{$tag->slug}}">{{$tag->descricao}}</a>
    @endforeach
</div>
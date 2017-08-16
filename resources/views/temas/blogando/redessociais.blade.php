<div class="bg-aside__caixa">
    <h3 class="bg-aside__titulo">@lang("messages.caixa.redessociais")</h3>
    <ul class="bg-aside__lista bg-aside__lista--redesocial">
        @foreach ($blogredessociais as $redesocial)                
            <li class="bg-aside__item"><a class="bg-aside__link bg-{{$redesocial->redesocial->slug}}" href="{{$redesocial->link}}"><i class="bg-aside__icone {{$redesocial->redesocial->icone}}"></i></a></li>
        @endforeach
    </ul> 
</div>
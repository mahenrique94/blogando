<div class="bg-aside__caixa bg-aside__caixa--newsletter">
    <div class="bg-aside__corpo">
        <ul class="bg-compartilhamento bg-compartilhamento--blog">
            <li class="bg-compartilhamento__item"><a class="bg-compartilhamento__link bg-compartilhamento__link--email" href="mailto:?subject={{"[Blog de Tecnologia] " . $blog->titulo}}&body={{$blog->descricao . "...: "}}{{$blog->url}}" onclick="compartilhar(event, this);"><i class="bg-compartilhamento__icone icon-email"></i></a></li>
            <li class="bg-compartilhamento__item"><a class="bg-compartilhamento__link bg-compartilhamento__link--facebook" href="https://www.facebook.com/sharer.php?u={{$blog->url}}" onclick="compartilhar(event, this);"><i class="bg-compartilhamento__icone icon-facebook"></i></a></li>
            <li class="bg-compartilhamento__item"><a class="bg-compartilhamento__link bg-compartilhamento__link--googleplus" href="https://plus.google.com/share?url={{$blog->url}}" onclick="compartilhar(event, this);"><i class="bg-compartilhamento__icone icon-gplus"></i></a></li>
            <li class="bg-compartilhamento__item"><a class="bg-compartilhamento__link bg-compartilhamento__link--linkedin" href="https://www.linkedin.com/shareArticle?url={{$blog->url}}&title={{$blog->titulo}}" onclick="compartilhar(event, this);"><i class="bg-compartilhamento__icone icon-linkedin"></i></a></li>
            <li class="bg-compartilhamento__item"><a class="bg-compartilhamento__link bg-compartilhamento__link--telegram" href="https://telegram.me/share/url?url={{$blog->url}}" onclick="compartilhar(event, this);"><i class="bg-compartilhamento__icone icon-telegram"></i></a></li>
            <li class="bg-compartilhamento__item"><a class="bg-compartilhamento__link bg-compartilhamento__link--twitter" href="https://twitter.com/intent/tweet?text={{$blog->titulo}}&url={{$blog->url}}&via='mahenrique94'" onclick="compartilhar(event, this);"><i class="bg-compartilhamento__icone icon-twitter"></i></a></li>
            <li class="bg-compartilhamento__item"><a class="bg-compartilhamento__link bg-compartilhamento__link--whatsapp" href="whatsapp://send?text={{$blog->url}}" onclick="compartilhar(event, this);"><i class="bg-compartilhamento__icone icon-whatsapp"></i></a></li>
        </ul>
    </div>
</div>
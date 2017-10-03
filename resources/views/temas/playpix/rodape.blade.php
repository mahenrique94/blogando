@section("rodape")
    <div class="bg-rodape">
        <div class="bg-rodape__marca">
            <a href="/">
                <img alt="{{$blog->titulo}}" class="bg-logo bg-rodape__logo" src="/assets/temas/{{$blog->aparencia->temablog}}/{{$blog->aparencia->temablog}}.png">
            </a>
            <span class="bg-rodape__direitos">&copy;Copyright 2017</span>
        </div>
        <ul class="bg-rodape__lista">
            <li class="bg-rodape__item"><a class="bg-rodape__link" href="#">Política de privacidade e segurança</a></li>
            <li class="bg-rodape__item"><a class="bg-rodape__link" href="#">Fale conosco</a></li>
            <li class="bg-rodape__item"><a class="bg-rodape__link" href="#">Anúncie</a></li>
        </ul>
    </div>
@stop
@extends("temas.mhc.email.template")
@section("titulo", "Post Newsletter")
@section("conteudo")
    <div>
        <div>
            <h2 style="margin: 0;"><a href="{{ $blog->url . "/" . $post->slug }}" style="color: #0099FF;text-decoration: none;" target="_blank">{{ $post->titulo }}</a></h2>
            <p style="color: #595959;font-size: .9rem;line-height: 1.5;margin: 0;">Postado em <time style="color: #0099FF;">{{date_format(date_create($post->datapostagem), $blog->parametros->formatodatahora->formato)}}</time> por <a href="{{$blog->url . "/autor/" . $post->perfil->slug }}" style="color: #0099FF;font-weight: bold;text-decoration: none;" target="_blank">{{$post->perfil->nome}}</a></p>
        </div>
        <div>
            <a href="{{ $blog->url . "/" . $post->slug }}" target="_blank">
                <div style="background-image: url({{ $blog->url . "/arquivo/download/posts/" . date_format(date_create($post->datapostagem), "Y") . "/" . date_format(date_create($post->datapostagem), "m") . "/" . $post->imagem }});background-position: center;background-repeat: no-repeat;background-size: cover;height: 300px;margin-top: 1rem;"></div>
            </a>
        </div>
        <div style="color: #595959;font-weight: 100;margin: 1rem 0;text-align: justify;">{{ $post->conteudoresumido }}...</div>
        <div>
            <a href="{{ $blog->url . "/" . $post->slug }}" style="background: transparent;border: 1px solid #0099FF;color: #0099FF;display: block;padding: 1rem;text-align: center;text-decoration: none;"target="_blank">Continuar Lendo</a>
        </div>
    </div>
@stop
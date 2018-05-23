@extends("temas.mhc.email.template")
@section("titulo", "Post Newsletter")
@section("conteudo")
    <div style="color: #595959;">
        <p>Você está quase lá, por favor, confirme sua inscrição em nossa <em>newsletter</em> clicando no <em>link</em> abaixo:</p>
        <p style="word-wrap: break-word;"><a href="{{ $blog->url }}/newsletter/confirmar/{{ $hash }}" style="color: #0099FF;text-decoration: none;">{{ $blog->url }}/newsletter/confirmar/{{ $hash }}</a></p>
        <p>Obrigado, fico muito feliz pelo interesse em assinar a <em>newsletter</em>.</p>
    </div>
@stop
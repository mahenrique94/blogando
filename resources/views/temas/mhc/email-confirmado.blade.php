@extends("temas.mhc.email.template")
@section("titulo"){{ $blog->titulo . " | Confirmação de Assinatura"}}@stop
@section("conteudo")
    <div style="background: #99FFCC;border: 1px solid #33FF99;border-radius: 5px;color: #008040;padding: 1rem 2rem;">
        <h3>Obrigado por confirmar sua inscrição</h3>
        <p>{{ $parametros->textoacompanharnewsletter }}</p>
    </div>
@stop
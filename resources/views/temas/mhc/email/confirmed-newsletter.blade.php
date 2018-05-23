@extends("temas.mhc.email.template")
@section("titulo", "Novo Assinante Confirmado")
@section("conteudo")
    <div style="color: #595959;">
        <p>Olá Matheus Castiglioni, um novo email confirmou a assinatura em sua <em>newsletter</em>:</p>
        <p style="background: #DCDCDC;color: #333333;padding: 1rem;">{{ $email }}</p>
        <p>Agora ele já pode receber novas publicações.</p>
    </div>
@stop
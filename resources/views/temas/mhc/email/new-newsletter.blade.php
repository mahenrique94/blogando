@extends("temas.mhc.email.template")
@section("titulo", "Novo Assinante")
@section("conteudo")
    <div style="color: #595959;">
        <p>Olá Matheus Castiglioni, um novo email assinou sua <em>newsletter</em>:</p>
        <p style="background: #DCDCDC;color: #333333;padding: 1rem;">{{ $email }}</p>
        <p>Aguarde ele confirmar a inscrição para começar á receber novas publicações.</p>
    </div>
@stop
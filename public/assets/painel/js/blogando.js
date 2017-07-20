/** @auth Matheus Castiglioni
 *  Funções JS e recursos para o BLOGANDO
 */

/** @auth Matheus Castiglioni
 *  Mostrar ou esconder o menu de navegacao
 */
function toggleNavegacao(link, event) {
    event.preventDefault();
    const navegacao = document.querySelector(link.href.substring(link.href.indexOf("#")));
    link.classList.toggle("is-ativo");
    if (navegacaoEstaEscondida(navegacao))
        mostrarNavegacao(navegacao);
    else
        esconderNavegacao(navegacao);
}
function navegacaoEstaEscondida(navegacao) {
    return navegacao.style.opacity == "" || navegacao.style.opacity == "0";
}
function mostrarNavegacao(navegacao) {
    navegacao.style.opacity = "1";
    navegacao.style.zIndex = "0";
}
function esconderNavegacao(navegacao) {
    navegacao.style.opacity = "0";
    navegacao.style.zIndex = "-1";
}
/** @auth Matheus Castiglioni
 *  Funções JS e recursos para o BLOGANDO
 */
const BASE_PAINEL = "painel";

/** @auth Matheus Castiglioni
 *  Códigos que devem ser executados assim que a página terminar de carregar
 */
window.addEventListener("load", e => {
    const link = buscaLinkAtivo(pegarLinkAtivo());
    if (link)
        link.classList.add("is-ativo");
});

/** @auth Matheus Castiglioni
 *  Buscando se existe algum link de navegação relacionado com o link atual da página
 */
const buscaLinkAtivo = linkAtivo => document.querySelector(`#link-${linkAtivo}`);

/** @auth Matheus Castiglioni
 *  Pegando o link atual da página
 */
function pegarLinkAtivo() {
    let url = window.location.href;
    url = url.substring(url.indexOf(BASE_PAINEL) + BASE_PAINEL.length + 1);
    if (url.indexOf("/") > 0)
        url = url.substring(0, url.indexOf("/"));
    if (url.indexOf("#") > 0)
        url = url.substring(0, url.indexOf("#"));
    return url;
}

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
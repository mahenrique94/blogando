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
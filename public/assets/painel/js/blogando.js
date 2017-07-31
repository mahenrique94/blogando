/** @auth Matheus Castiglioni
 *  Funções JS e recursos para o BLOGANDO
 */
const cancelarEvento = event => event.preventDefault();
const carregarImagem = event => mostrarImagem(URL.createObjectURL(event.target.files[0]));
const buscarMensagem = elemento => elemento.querySelector(".js-mensagem");
const buscarSelect = elemento => elemento.querySelector(".js-select");
const existeElemento = elemento => elemento;
const esconderElemento = elemento => elemento.style.display = "none";
const mostrarElemento = elemento => elemento.style.display = "block";
const tabClicadaJaEstaAtiva = (tab, clicada) => tab.id === clicada.substring(1);
const toggleAtivo = elemento => elemento.classList.toggle("is-ativo");

window.addEventListener("load", event => {
    const inputFile = $(".js-inputImagem");
    if (existeElemento(inputFile))
        inputFile.addEventListener("change", carregarImagem);
});

/** @auth Matheus Castiglioni
 *  Mostrar ou esconder o menu de navegacao
 */
function toggleNavegacao(link, event) {
    cancelarEvento(event);
    const navegacao = $(link.href.substring(link.href.indexOf("#")));
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
    navegacao.style.zIndex = "1";
}
function esconderNavegacao(navegacao) {
    navegacao.style.opacity = "0";
    navegacao.style.zIndex = "-1";
}

/** @auth Matheus Castiglioni
 *  Realizar click no input file que esta escondido
 */
function buscarImagem(botao, event) {
    cancelarEvento(event);
    const input = $(".js-inputImagem");
    if (existeElemento(input))
        input.click();
}

/** @auth Matheus Castiglioni
 *  Carregar imagem no navegador assim que for selecionada
 */
function mostrarImagem(url) {
    const imagem = $(".js-imagem");
    if (existeElemento(imagem)) {
        const corpo = imagem.parentNode;
        esconderMensagem(corpo);
        imagem.setAttribute("src", url);
        mostrarElemento(imagem);
    }
}

/** @auth Matheus Castiglioni
 *  Mostrar o select contendo todas as categorias e tags das caixas do formulário do post
 */
function mostrarSelect(botao, event) {
    cancelarEvento(event);
    const caixa = botao.parentNode.parentNode;
    const select = buscarSelect(caixa);
    if (existeElemento(select)) {
        esconderMensagem(caixa);
        esconderElemento(botao);
        mostrarElemento(select);
        mostrarElemento(botao.nextElementSibling);
    }
}

/** @auth Matheus Castiglioni
 *  Esconder o select contendo todas as categorias e tags das caixas do formulário do post
 */
function esconderSelect(botao, event) {
    cancelarEvento(event);
    const caixa = botao.parentNode.parentNode.parentNode;
    const select = buscarSelect(caixa);
    if (existeElemento(select)) {
        mostrarMensagem(caixa);
        esconderElemento(select);
        esconderElemento(botao.parentNode);
        mostrarElemento(botao.parentNode.previousElementSibling);
    }
}

/** @auth Matheus Castiglioni
 *  Esconder mensagem que informa se uma categoria ou tag não esta selecionada
 */
function esconderMensagem(elemento) {
    const mensagem = buscarMensagem(elemento);
    if (existeElemento(mensagem))
        esconderElemento(mensagem);
}

/** @auth Matheus Castiglioni
 *  Mostrar mensagem que informa se uma categoria ou tag não esta selecionada
 */
function mostrarMensagem(elemento) {
    const mensagem = buscarMensagem(elemento);
    if (existeElemento(mensagem))
        mostrarElemento(mensagem);
}

/** @auth Matheus Castiglioni
 *  Realizar troca da tabs
 */
function tab(link) {
    const id = link.href.substring(link.href.indexOf("#"));
    const ativa = link.parentNode.nextElementSibling.querySelector(".is-show");    
    const tab = link.parentNode.nextElementSibling.querySelector(id);
    if (tabClicadaJaEstaAtiva(ativa, id))
        return false;
    limparAtivo(link);
    toggleTab(ativa);
    toggleTab(tab);
}
function toggleTab(tab) {
    tab.classList.toggle("is-show");
    tab.classList.toggle("is-hide");
}
function limparAtivo(link) {
    const ativoAtual = link.parentNode.querySelector(".is-ativo");
    toggleAtivo(ativoAtual);
    toggleAtivo(link);
}
/** @auth Matheus Castiglioni
 *  Funções JS e recursos para o BLOGANDO
 */
const carregarImagem = event => mostrarImagem(URL.createObjectURL(event.target.files[0]));

window.addEventListener("load", event => {
    const inputFile = document.querySelector(".js-inputImagem");
    if (inputFile)
        inputFile.addEventListener("change", carregarImagem);
});

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
    event.preventDefault();
    const input = document.querySelector(".js-inputImagem");
    if (input)
        input.click();
}

/** @auth Matheus Castiglioni
 *  Carregar imagem no navegador assim que for selecionada
 */
function mostrarImagem(url) {
    const imagem = document.querySelector(".js-imagem");
    if (imagem) {
        const corpo = imagem.parentNode;
        corpo.innerHTML = "";
        corpo.appendChild(copiarImagem(imagem, url));
    }
}

/** @auth Matheus Castiglioni
 *  Criar um novo elemento do DOM com a imagem selecionada
 */
function copiarImagem(imagem, url) {
    const novaImagem = document.createElement("img");
    novaImagem.setAttribute("src", url);
    novaImagem.setAttribute("alt", imagem.alt);
    novaImagem.className = imagem.className;
    novaImagem.style.display = "block";
    return novaImagem;
}
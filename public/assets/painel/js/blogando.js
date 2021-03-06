/** @auth Matheus Castiglioni
 *  Funções JS e recursos para o BLOGANDO
 */
var arquivos;
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

    const inputArquivos = $(".js-arquivos");
    if (existeElemento(inputArquivos))
        inputArquivos.addEventListener("change", criarImagens);
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
        const corpo = imagem.parentNode.parentNode;
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

/** @auth Matheus Castiglioni
 *  Realizar click no input file que esta escondido
 */
function selecionarArquivo(event) {
    cancelarEvento(event);
    const inputArquivo = $("[type=file]");
    if (existeElemento(inputArquivo))
        inputArquivo.click();
}

function criarImagens(event) {
    arquivos = event.target.files;
    for (let arquivo of arquivos) {
        inserirImagem(criarImagem(arquivo));
    }
}
function criarImagem(arquivo) {
    const imagem = document.createElement("img");
    imagem.classList.add("bg-p-midia__arquivo");
    imagem.src = URL.createObjectURL(arquivo);
    imagem.alt = arquivo.name;
    return imagem;
}
function inserirImagem(imagem) {
    const conteudo = $(".bg-p-midia__arquivos");
    if (existeElemento(conteudo))
        conteudo.appendChild(imagem);
}

/** @auth Matheus Castiglioni
 *  Copiar a URL de uma imagem para o CTRL+V
 */
function copiarClipboard(botao, event) {
    cancelarEvento(event);
    const url = botao.parentNode.parentNode.querySelector(".js-link");
    if (existeElemento(url)) {
        const td = botao.parentNode.previousElementSibling;
        url.select();
        document.execCommand("copy");
        url.style.color = "#00CC99";
        url.value = "Link copiado";
        url.blur();
    }
}

/** @auth Matheus Castiglioni
 *  Responder um comentário nos posts
 */
function responderComentario(link) {
    const form = $(link.href.substring(link.href.indexOf("#")));
    if (existeElemento(form))
        form.idcomentario.value = link.dataset.comentario;
}

/** @auth Matheus Castiglioni
 *  Deletar uma midia da biblioteca
 */
function requestDeleteMidia(obj) {
    const URL = obj.href || obj.formAction;
    const ID = URL.substring(URL.lastIndexOf("=") + 1);
    HttpService.request(URL, "DELETE").then(response => {
        console.log(response);
        obj.parentNode.parentNode.parentNode.parentNode.parentNode.remove();
        append(newToast("o-toast--success", "Registro excluido com sucesso", "icon-ok-circled"));
    }).catch(error => {
        append(newToast("o-toast--error", "Registro nao pode ser excluido", "icon-cancel-circled"));
        console.error(error);
    });
};

/** @auth Matheus Castiglioni
 *  Criar o input do id do post
 */
function criarInputIdPost(acao) {
    const idPost = document.createElement("input");
    idPost.name = "idpost";
    idPost.value = acao.dataset.post;
    return idPost;
}

/** @auth Matheus Castiglioni
 *  Configurar parâmetros da requisição
 */
function configurarParametrosDaEstatistica(acao) {
    const data = [criarInputIdPost(acao)];
    return data;
}

/** @auth Matheus Castiglioni
 *  Curtir um post
 */
function curtirPost(acao) {
    HttpService.request("/post/curtir", "POST", configurarParametrosDaEstatistica(acao), true)
        .then(resposta => acao.classList.toggle("is-curtido"))
        .catch(erro => console.error(erro));
}

/** @auth Matheus Castiglioni
 *  Curtir um post
 */
function favoritarPost(acao) {
    HttpService.request("/post/favoritar", "POST", configurarParametrosDaEstatistica(acao), true)
        .then(resposta => acao.classList.toggle("is-favoritado"))
        .catch(erro => console.error(erro));
}
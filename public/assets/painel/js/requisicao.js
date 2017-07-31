/** @auth Matheus Castiglioni
 *  Requisições Ajax
 */

/** @auth Matheus Castiglioni
 *  Criando, deletando e listando categorias e tags dos posts
 */
function salvarCaixa(botao, tipo, event) {
    cancelarEvento(event);
    const data = [$("[name=\"id\"]"), $(`[name="${tipo}"]`)];
    HttpService.request(botao.formAction, botao.formMethod, data, true)
        .then(resposta => {
            resposta = JSON.parse(resposta);
            const select = $(`[name="${tipo}"]`);
            const option = select.options[select.selectedIndex];
            const caixa = botao.parentNode.parentNode.parentNode;
            const corpo = botao.parentNode.parentNode.previousElementSibling;
            let lista = caixa.querySelector(".js-lista");
            if (existeElemento(lista)) {
                lista.appendChild(criarItem(option.textContent, resposta));
            } else {
                lista = criarLista();                
                lista.appendChild(criarItem(option.textContent, resposta));
                corpo.appendChild(lista);
                const mensagem = buscarMensagem(caixa);
                if (existeElemento(mensagem))
                    mensagem.remove();
            }
        }).catch(error => {
            const caixa = botao.parentNode.parentNode.parentNode;
            const mensagem = buscarMensagem(caixa);
            if (existeElemento(mensagem)) {
                mensagem.textContent = "Erro durante a requisição";
                mensagem.style.marginTop = ".5rem";
                mensagem.style.color = "#FF8080";
                mostrarElemento(mensagem);
            }
        });
}
function criarLista() {
    const lista = document.createElement("ul");
    lista.classList.add("bg-p-caixa__lista", "js-lista");
    return lista;
}
function criarItem(conteudo, resposta) {
    const item = document.createElement("li");
    item.classList.add("bg-p-caixa__item", "js-item");
    item.textContent = conteudo;
    item.appendChild(criarBotaoDeletar(resposta));
    return item;
}
function criarBotaoDeletar({id}) {
    const span = document.createElement("span");
    const botao = document.createElement("button");
    botao.classList.add("bg-p-caixa__acao");
    botao.formAction = `/painel/post/categoria/${id}`;
    botao.setAttribute("onclick", "DialogController.build(event, this, requestDelete, 'Deseja confirmar a exclusao', 'icon-trash');");
    botao.role = "button";
    botao.type = "button";
    botao.title = "Deletar";
    botao.style.float = "right";
    botao.appendChild(criarIconeDeletar());
    span.appendChild(botao);
    return span;
}
function criarIconeDeletar() {
    const icone = document.createElement("i");
    icone.classList.add("icon-minus", "bg-p-caixa__icone");
    return icone;
}

/** @auth Matheus Castiglioni
 *  Lendo notificações
 */
function lerNotificacao(notificacao) {
    HttpService.request(notificacao.formAction, notificacao.formMethod, null, false)
        .then(resposta => {
            removerNotificacao(notificacao);
            atualizarContagemDeNotificacoes();
        });
}
function animacaoRemoverNotificacao(notificacao) {
    notificacao.animate({
        transform: ["scale(1)", "scale(0)"]
    }, {
        duration: 200,
        easing: "linear",
        fill : "forwards"
    });
}
function removerNotificacao(notificacao) {
    const caixa = notificacao.parentNode
    const caixaAux = $(`[data-notificacao="${caixa.dataset.id}"`);
    if (existeElemento(caixaAux))
        caixaAux.classList.add("bg-p-notificacao__caixa--lida");
    removerCaixaNotificacao(caixa);
}
function removerCaixaNotificacao(caixa) {
    animacaoRemoverNotificacao(caixa);
    setTimeout(() => caixa.remove(), 200);    
}
function atualizarContagemDeNotificacoes() {
    const contadores = $$(".js-quantidadeNotificacao");
    if (contadores.length > 0) {
        contadores.forEach(contador => {
            const quantidadeAtual = parseInt(contador.textContent) - 1;
            contador.textContent = quantidadeAtual;
            if (quantidadeAtual == 0)
                contador.remove();
        });
    }
}

/** @auth Matheus Castiglioni
 *  Enviar as imagens para o servidor via Ajax
 */
function enviarImagens(form, event) {
    cancelarEvento(event);
    const data = new FormData();
    data.append("arquivos", arquivos[0]);
    HttpService.upload(form.action, form.method, data)
        .then(resposta => console.log(resposta))
        .catch(erro => console.error(erro));
}
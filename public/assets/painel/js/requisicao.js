/** @auth Matheus Castiglioni
 *  Requisições Ajax
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
/** @auth Matheus Castiglioni
 *  Arquivos onde contém todas as animações da plataforma
 */

/** @auth Matheus Castiglioni
 *  Animação para mostrar elementos
 */
const elementoEstaEscondido = elemento => elemento.dataset.animacaoSituacao === "desanimado";
function toggleElemento(link, event) {
    event.preventDefault();
    const elemento = document.querySelector(link.href.substring(link.href.indexOf("#")));
    link.classList.toggle("is-ativo");
    if (elementoEstaEscondido(elemento)) {
        animacaoMostrarElemento(elemento);
        elemento.dataset.animacaoSituacao = "animado";
    } else {
        animacaoEsconderElemento(elemento);
        elemento.dataset.animacaoSituacao = "desanimado";
    }
}
function animacaoMostrarElemento(elemento) {
    elemento.animate({
        opacity : [0, 1],
        transform: ["translateX(500px)", "translateX(0)"]
    }, {
        duration: 250,
        easing: "linear",
        fill : "forwards"
    });
}
function animacaoEsconderElemento(elemento) {
    elemento.animate({
        opacity : [1, 0],
        transform: ["translateX(0)", "translateX(500px)"]
    }, {
        duration: 250,
        easing: "linear",
        fill : "forwards"
    });
}
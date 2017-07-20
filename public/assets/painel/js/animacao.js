/** @auth Matheus Castiglioni
 *  Arquivos onde contém todas as animações da plataforma
 */

/** @auth Matheus Castiglioni
 *  Animação para mostrar as opções do perfil de usuário
 */
const perfilEstaEscondido = perfil => perfil.dataset.animacaoSituacao === "desanimado";
function togglePerfil(link, event) {
    event.preventDefault();
    const perfil = document.querySelector(link.href.substring(link.href.indexOf("#")));
    if (perfilEstaEscondido(perfil)) {
        animacaoMostrarPerfil(perfil);
        perfil.dataset.animacaoSituacao = "animado";
    } else {
        animacaoEsconderPerfil(perfil);
        perfil.dataset.animacaoSituacao = "desanimado";
    }
}
function animacaoMostrarPerfil(perfil) {
    perfil.animate({
        opacity : [0, 1],
        transform: ["translateX(500px)", "translateX(0)"]
    }, {
        duration: 250,
        easing: "linear",
        fill : "forwards"
    });
}
function animacaoEsconderPerfil(perfil) {
    perfil.animate({
        opacity : [1, 0],
        transform: ["translateX(0)", "translateX(500px)"]
    }, {
        duration: 250,
        easing: "linear",
        fill : "forwards"
    });
}
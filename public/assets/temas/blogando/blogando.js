const esconderNav = nav => nav.style.display = "none";
const mostrarNav = nav => nav.style.display = "block";
const navEstaEscondida = nav => nav.style.display === "none" || nav.style.display === "" || nav.style.display == undefined;

function toggleNav(event) {
    event.preventDefault();
    const nav = document.querySelector(".bg-nav");
    if (nav) {
        if (navEstaEscondida(nav))
            mostrarNav(nav);
        else
            esconderNav(nav);
    }
}

const postsRecentes = document.querySelectorAll(".js-bg-aside__link");
if (postsRecentes.length > 0) {
    postsRecentes.forEach(postRecente => {
       if (postRecente.textContent.length > 85)
           postRecente.textContent = postRecente.textContent.toString().substring(0, 85).trim() + "...";
    });
}
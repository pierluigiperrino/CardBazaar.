// Dichiarazione della variabile per tenere traccia dell'ultima posizione dello scroll
let lastScrollY = 0;

// Aggiunge un event listener per il evento di scroll sulla finestra
window.addEventListener('scroll', () => {
    // Seleziona l'elemento HTML con la classe "navbar" e assegna a 'navbar' il suo riferimento
    const navbar = document.querySelector('.navbar');

    // Ottiene la posizione corrente dello scroll verticale dalla cima della pagina
    const currentScrollY = window.scrollY;

    // Verifica se l'utente sta scorrendo verso il basso
    if (currentScrollY > lastScrollY) {
        // Se sta scorrendo verso il basso, nascondi la barra di navigazione
        navbar.classList.add('navbar-hidden');
        navbar.classList.remove('navbar-visible');
    } else {
        // Altrimenti, se sta scorrendo verso l'alto, mostra la barra di navigazione
        navbar.classList.remove('navbar-hidden');
        navbar.classList.add('navbar-visible');
    }

    // Aggiorna la variabile 'lastScrollY' con la posizione corrente dello scroll
    lastScrollY = currentScrollY;
});

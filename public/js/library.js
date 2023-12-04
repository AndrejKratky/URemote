function addAuthor() {
    const authorsContainer = document.getElementById('autorContainer');
    const noveInputPole = document.createElement('input');
    noveInputPole.type = 'text';
    noveInputPole.name = 'author[]';
    noveInputPole.placeholder = 'Zadajte meno autora...';
    noveInputPole.className = 'form-control mb-2';
    authorsContainer.appendChild(noveInputPole);
}

function removeAuthor() {
    const authorsContainer = document.getElementById('autorContainer');
    const vsetciAutori = authorsContainer.getElementsByTagName('input');
    if (vsetciAutori.length > 1) {
        authorsContainer.removeChild(vsetciAutori[vsetciAutori.length - 1]);
    }
}

const vyberRok = document.getElementById('rokVydania');
if (vyberRok) {
    let aktualnyRok = new Date().getFullYear();
    for (let rok = aktualnyRok; rok >= 1970; rok--) {
        const volbaRoku = document.createElement('option');
        volbaRoku.value = rok.toString();
        volbaRoku.textContent = rok.toString();
        vyberRok.appendChild(volbaRoku);
    }
}

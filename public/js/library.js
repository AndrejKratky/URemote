document.addEventListener('DOMContentLoaded', function() {
    const buyButtons = document.querySelectorAll('.btn-buy');
    const borrowButtons = document.querySelectorAll('.btn-borrow');
    const readButtons = document.querySelectorAll('.btn-read');

    buyButtons.forEach(buyButton => {
        buyButton.addEventListener('click', function() {
            const bookId = this.getAttribute('data-book-id');
            handleAction('buy', userId, bookId);
        });
    });

    borrowButtons.forEach(borrowButton => {
        borrowButton.addEventListener('click', function() {
            const bookId = this.getAttribute('data-book-id');
            handleAction('borrow', userId, bookId);
        });
    });

    readButtons.forEach(readButton => {
        readButton.addEventListener('click', function() {
            const bookId = this.getAttribute('data-book-id');
            handleAction('read', userId, bookId);
        });
    });

    function handleAction(action, userId, bookId) {
        if (!isAuthenticated) {
            window.location.href = '/login';
        } else if (action === 'buy') {
            fetch(`/buyBook/${userId}/${bookId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({
                    action: 'buyBook',
                }),
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                })
                .catch(error => console.error('Error:', error));
        } else if (action === 'borrow') {
            fetch(`/borrowBook/${userId}/${bookId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({
                    action: 'borrowBook',
                }),
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                })
                .catch(error => console.error('Error:', error));
        }
    }
});

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

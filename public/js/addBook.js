let bookYear = document.getElementById('bookYear');
if (bookYear) {
    let aktualnyRok = new Date().getFullYear();
    for (let rok = aktualnyRok; rok >= 1970; rok--) {
        let volbaRoku = document.createElement('option');
        volbaRoku.value = rok.toString();
        volbaRoku.textContent = rok.toString();
        bookYear.appendChild(volbaRoku);
    }
}

document.getElementById('addBookForm').addEventListener('submit', function(event) {
    let fields = [
        'bookName', 'bookAuthors', 'bookPrice', 'bookPriceBorrow',
        'bookYear', 'bookFaculty', 'bookPages', 'bookDescription'
    ];

    let useDefaultCover = document.getElementById('defaultCover').checked;
    if (!useDefaultCover) {
        fields.push('bookCover');
    }

    <!-- Prazdne hodnoty -->
    for (let i = 0; i < fields.length; i++) {
        let field = document.getElementById(fields[i]);
        if (!field.value) {
            event.preventDefault();
            field.scrollIntoView({ behavior: 'smooth', block: 'center' });
            field.focus();
            break;
        }
    }

    <!-- regex autor -->
    let authorPattern = /^([A-Za-z_áéíóúčšžÁÉÍÓÚČŠŽ]+_[A-Za-z_áéíóúčšžÁÉÍÓÚČŠŽ]+)(,[A-Za-z_áéíóúčšžÁÉÍÓÚČŠŽ]+_[A-Za-z_áéíóúčšžÁÉÍÓÚČŠŽ]+)*$/
    let bookAuthors = document.getElementById('bookAuthors');
    if (!authorPattern.test(bookAuthors.value)) {
        event.preventDefault();
        bookAuthors.scrollIntoView({ behavior: 'smooth', block: 'center' });
        bookAuthors.focus();
    }

    <!-- regex price & borrow -->
    let decimalPattern = /^\d+(\.\d+)?$/;
    let bookPrice = document.getElementById('bookPrice');
    let bookPriceBorrow = document.getElementById('bookPriceBorrow');

    if (!decimalPattern.test(bookPrice.value) && !decimalPattern.test(bookPriceBorrow.value)) {
        event.preventDefault();
        bookPrice.scrollIntoView({ behavior: 'smooth', block: 'center' });
        bookPrice.focus();
    } else if (decimalPattern.test(bookPrice.value) && !decimalPattern.test(bookPriceBorrow.value)) {
        event.preventDefault();
        bookPriceBorrow.scrollIntoView({ behavior: 'smooth', block: 'center' });
        bookPriceBorrow.focus();
    } else if (!decimalPattern.test(bookPrice.value) && decimalPattern.test(bookPriceBorrow.value)) {
        event.preventDefault();
        bookPrice.scrollIntoView({ behavior: 'smooth', block: 'center' });
        bookPrice.focus();
    }

    <!-- book pages range -->
    let bookPages = document.getElementById('bookPages');
    if (bookPages.value < 1 || bookPages.value > 9999) {
        event.preventDefault();
        bookPages.scrollIntoView({ behavior: 'smooth', block: 'center' });
        bookPages.focus();
    }
});

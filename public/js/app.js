function searchLibrary() {
    const inputElement = document.querySelector('.hladajTitulokLabel');
    window.location.href = '/library?search=' + encodeURIComponent(inputElement.value);
}

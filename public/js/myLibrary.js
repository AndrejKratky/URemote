document.addEventListener('DOMContentLoaded', function () {
    let favouriteLinks = document.querySelectorAll('.favouriteLink');
    favouriteLinks.forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            let userBookId = link.dataset.userBookId;
            let xhr = new XMLHttpRequest();
            xhr.open('POST', '/updateBookFavourite/' + userBookId, true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        let data = JSON.parse(xhr.responseText);
                        if (data.success) {
                            let heartIcon = link.querySelector('i.bi');
                            if (data.oblubena) {
                                heartIcon.classList.remove('bi-heart');
                                heartIcon.classList.add('bi-heart-fill');
                            } else {
                                heartIcon.classList.remove('bi-heart-fill');
                                heartIcon.classList.add('bi-heart');
                            }
                            console.log('User book marked as obľúbené');
                        } else {
                            console.error('Failed to update user book obľúbené status:', data.message);
                        }
                    } else {
                        console.error('AJAX request failed:', xhr.status, xhr.statusText);
                    }
                }
            };
            xhr.send();
        });
    });
});

document.getElementById('registerForm').addEventListener('submit', function(event) {
    let errors = document.getElementById('errorOutput');
    let hasErrors = false;
    let nameField = document.getElementById('username');
    let passwordField = document.getElementById('password');

    errors.innerHTML = '';

    if (!nameField.value) {
        appendError(errors, 'Meno musí byť zadané!');
        hasErrors = true;
    }

    if (!passwordField.value) {
        appendError(errors, 'Heslo musí byť zadané!');
        hasErrors = true;
    }

    if (passwordField.value.length < 6 && passwordField.value) {
        appendError(errors, 'Heslo musí byť aspoň 6 znakov dlhé!');
        hasErrors = true;
    }

    if (hasErrors) {
        errors.style.display = 'block';
        event.preventDefault();
    } else {
        errors.style.display = 'none';
    }
});

function appendError(container, message) {
    let errorDiv = document.createElement('div');
    errorDiv.textContent = message;
    container.appendChild(errorDiv);
}

document.addEventListener('DOMContentLoaded', function() {
    let inputs = document.querySelectorAll('#username, #password, #email');
    let errorDiv = document.getElementById('loginError');

    inputs.forEach(function(input) {
        input.addEventListener('input', function() {
            if (errorDiv) {
                errorDiv.style.display = 'none';
            }
        });
    });
});

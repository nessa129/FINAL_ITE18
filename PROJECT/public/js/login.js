const signUpButton = document.getElementById('signUp');
const logInButton = document.getElementById('logIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
    container.classList.add('right-panel-active');
});

logInButton.addEventListener('click', () => {
    container.classList.remove('right-panel-active');
});

document.addEventListener('DOMContentLoaded', () => {
    const passwordInput = document.getElementById('password');
    const passwordWarning = document.getElementById('password-warning');

    passwordInput.addEventListener('input', () => {
        const password = passwordInput.value;
        const hasNumber = /\d/.test(password); // Check if password contains a number
        const isValidLength = password.length >= 8; // Check if password length is at least 8

        if (!isValidLength || !hasNumber) {
            passwordWarning.textContent = "Password must be at least 8 characters long and include a number.";
            passwordWarning.style.color = "red";
        } else {
            passwordWarning.textContent = ""; // Clear warning message when valid
        }
    });
});

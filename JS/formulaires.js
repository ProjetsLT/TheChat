document.addEventListener("DOMContentLoaded", function () {
    const passwordInput = document.getElementById("mdpIns");
    const passwordLengthMessage = document.getElementById("passwordLengthMessage");
    const passwordSpecialCharMessage = document.getElementById("passwordSpecialCharMessage");

    passwordInput.addEventListener("input", function () {
        const password = passwordInput.value;
        const hasMinimumLength = password.length >= 8;
        const hasSpecialCharacter = /[!@#$%^&*()_+[\]{};':"\\|,.<>/?]+/.test(password);

        if (!hasMinimumLength) {
            passwordLengthMessage.classList.add("text-red-600");
            passwordLengthMessage.classList.remove("text-green-700");
        } else {
            passwordLengthMessage.classList.remove("text-red-600");
            passwordLengthMessage.classList.add("text-green-700");
        }

        if (!hasSpecialCharacter) {
            passwordSpecialCharMessage.classList.add("text-red-600");
            passwordSpecialCharMessage.classList.remove("text-green-700");
        } else {
            passwordSpecialCharMessage.classList.remove("text-red-600");
            passwordSpecialCharMessage.classList.add("text-green-700");
        }
    });

    // Initial setup to show messages in red
    passwordLengthMessage.classList.add("text-red-600");
    passwordSpecialCharMessage.classList.add("text-red-600");
});

document.addEventListener("DOMContentLoaded", function () {
    const passwordInput = document.getElementById("mdpIns");
    const confirmPasswordInput = document.getElementById("mdpIns2");
    const passwordMatchMessage = document.getElementById("passwordMatchMessage");

    confirmPasswordInput.addEventListener("input", function () {
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;

        if (password != confirmPassword) {
            passwordMatchMessage.textContent = "Les mots de passe ne correspondent pas";
            passwordMatchMessage.classList.add("text-red-600");
            passwordMatchMessage.classList.remove("text-green-700");
        } else {
            passwordMatchMessage.textContent = "Les mots de passe correspondent";
            passwordMatchMessage.classList.remove("text-red-600");
            passwordMatchMessage.classList.add("text-green-700");
        }
    });

    // Initial setup to show message in red
    passwordMatchMessage.classList.add("text-red-600");
});
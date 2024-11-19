function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function live_validate_email() {
    const email = document.getElementById("email").value;
    if (!validateEmail(email)) {
        const invalidEmail = document.getElementById("invalidEmail");
        invalidEmail.style.display = "block";
        return false;
    }else{
        const invalidEmail = document.getElementById("invalidEmail");
        invalidEmail.style.display = "none";
    }
}

function live_validate_password() {
    const password = document.getElementById("password").value;
    if (password.length < 8) {
        const invalidPassword = document.getElementById("invalidPassword");
        invalidPassword.style.display = "block";
        return false;
    } else {
        const invalidPassword = document.getElementById("invalidPassword");
        invalidPassword.style.display = "none";
    }
}

const email = document.getElementById("email");
email.addEventListener("input", live_validate_email);

const password = document.getElementById("password");
password.addEventListener("input", live_validate_password);
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

const email = document.getElementById("email");
email.addEventListener("input", live_validate_email);

function validate_login() {
    
    const invalidEmail = document.getElementById("invalidEmail");
    const password = document.getElementById("password").value;
    const checkbox = document.getElementById("remember-me").checked;

    
}
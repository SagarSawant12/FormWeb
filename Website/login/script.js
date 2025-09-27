// Function to Show Login Form
function showLogin() {
    document.getElementById("login-form").classList.add("active");
    document.getElementById("signup-form").classList.remove("active");
}

// Function to Show Signup Form
function showSignup() {
    document.getElementById("signup-form").classList.add("active");
    document.getElementById("login-form").classList.remove("active");
}

// Show Login Form by Default
document.addEventListener("DOMContentLoaded", function () {
    showLogin();
});

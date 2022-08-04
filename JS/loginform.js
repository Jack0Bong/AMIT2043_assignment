function loginForm(){
    loginButton = document.querySelector("#tab-login");
    registerButton = document.querySelector("#tab-register");
    loginform = document.querySelector("#login-form");
    registerform = document.querySelector("#register-form");

    loginform.style.display = "block";
    registerform.style.display = "none";

    loginButton.classList.add("active");
    registerButton.classList.remove("active");


}
function registerForm(){
    loginButton = document.querySelector("#tab-login");
    registerButton = document.querySelector("#tab-register");
    loginform = document.querySelector("#login-form");
    registerform = document.querySelector("#register-form");

    loginform.style.display = "none";
    registerform.style.display = "block";

    registerButton.classList.add("active");     
    loginButton.classList.remove("active");

}
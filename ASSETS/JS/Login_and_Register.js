function clearAll() {
    document.getElementById('signin_emailid').value = '';
    document.getElementById('signin_password').value = '';
    document.getElementById('signup_name').value = '';
    document.getElementById('signup_emailid').value = '';
    document.getElementById('signup_password').value = '';
}

const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});

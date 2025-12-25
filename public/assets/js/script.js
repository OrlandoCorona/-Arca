document.addEventListener("DOMContentLoaded", () => {
  const title = document.querySelector("h1");
  const logo = document.querySelector(".logo");

  const loginForm = document.getElementById("login-form");
  const registerForm = document.getElementById("registration-form");
  const recoverForm = document.getElementById("fpass-form");

  const otherOptions = document.querySelector(".other-options");

  const show = (el) => {
    el.style.display = "block";
    el.style.opacity = 0;
    setTimeout(() => {
      el.style.transition = "opacity .4s ease";
      el.style.opacity = 1;
    }, 10);
  };

  const hide = (el) => {
    el.style.transition = "opacity .2s ease";
    el.style.opacity = 0;
    setTimeout(() => {
      el.style.display = "none";
    }, 200);
  };

  // NUEVO USUARIO
  const newUserBtn = document.getElementById("newUser");
  if (newUserBtn) {
    newUserBtn.addEventListener("click", () => {
      title.textContent = "Registration";
      logo.style.width = "120px";
      logo.style.height = "120px";
      logo.style.top = "10px";

      hide(loginForm);
      hide(recoverForm);
      hide(otherOptions);

      setTimeout(() => show(registerForm), 250);
    });
  }

  // VOLVER A LOGIN
  const backBtns = document.querySelectorAll("#signup-btn, #getpass-btn");
  backBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
      title.textContent = "Log in";
      logo.style.width = "150px";
      logo.style.height = "150px";
      logo.style.top = "30px";

      hide(registerForm);
      hide(recoverForm);

      setTimeout(() => {
        show(loginForm);
        show(otherOptions);
      }, 250);
    });
  });

  // OLVIDÉ CONTRASEÑA
  const fpassBtn = document.getElementById("fPass");
  if (fpassBtn) {
    fpassBtn.addEventListener("click", () => {
      title.textContent = "Forgotten password";
      logo.style.width = "190px";
      logo.style.height = "190px";
      logo.style.top = "40px";

      hide(loginForm);
      hide(otherOptions);

      setTimeout(() => show(recoverForm), 250);
    });
  }
});

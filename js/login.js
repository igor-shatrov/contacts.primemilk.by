document.querySelector("#login-submit").onclick = event => {
  event.preventDefault();
  let login = {
    email: document.querySelector("#login-email").value,
    pass: document.querySelector("#login-pass").value
  };
  console.log(login);
  ajax("php/login.php", "post", loginFunc, login);
};
function loginFunc(result) {
  console.log(result);
  if (result == 2) {
    M.toast({ html: "Заполните поля" });
  } else if (result == 0) {
    M.toast({ html: "Пользователь не найден" });
  } else {
    result = JSON.parse(result);
    let d = new Date();
    d.setTime(d.getTime() + 100 * 60 * 1000);
    let expires = d.toUTCString();
    document.cookie = `email=${result.email}; expires=${expires}; path=/`;
    location.href = "cabinet.php";
  }
}

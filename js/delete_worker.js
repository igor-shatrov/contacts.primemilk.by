document.querySelector("#delete-worker").onclick = function() {
  document.querySelector("#worker-tools-wrapper").classList.add("hide");
  document.querySelector("#delete-sure-wrapper").classList.remove("hide");
};

document.querySelector("#delete-worker-yes").onclick = function() {
  let id = document.querySelector("#id").textContent;
  ajax("php/delete.php", "post", deleteWorker, [id]);
};

document.querySelector("#delete-worker-no").onclick = function() {
  document.querySelector("#worker-tools-wrapper").classList.remove("hide");
  document.querySelector("#delete-sure-wrapper").classList.add("hide");
};

function deleteWorker(result) {
  console.log(result);
  if (result == 3) {
    M.toast({ html: "Удаление завершено успешно" });
    document.querySelector("#worker-tools-wrapper").classList.remove("hide");
    document.querySelector("#delete-sure-wrapper").classList.add("hide");
    closeModal();
  } else {
    M.toast({ html: "Ошибка, свяжитесь с админом" });
  }
}
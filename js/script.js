
document.querySelectorAll('.modal-show').forEach(function (element) {
  element.onclick = showModal;
});
document.querySelectorAll('.modal-project-close').forEach(function (element) {
  //закрываем окно на кнопке закрыть
  element.onclick = closeModal;
});
document.querySelectorAll('.modal-wrap').forEach(function (element) {
  //закрываем окно на клике в области серой
  element.onclick = closeModal;
});

document.addEventListener("DOMContentLoaded", function() {
  var elems = document.querySelectorAll("select");
  let options = {};
  var instances = M.FormSelect.init(elems, options);
});

function showModal() {
  console.log(this);
  
  let modalId = this.dataset.modal;
  console.log(modalId);
  document.querySelector(modalId).classList.remove('hide');
  document.onkeydown = function (event) {
      //закрываем окно на кнопку Esc
      if (event.keyCode == 27) closeModal();
  }
}

function closeModal() {
  document.querySelectorAll('.modal-wrap').forEach(function (element) {
      element.classList.add('hide');
  });
  document.onkeydown = null;
}
document.querySelector('#log-in .modal-project').onclick = function (event) {
  event.stopPropagation();
}
document.querySelector("#worker-show .modal-worker").onclick = function(event) {
  event.stopPropagation();
};



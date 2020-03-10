document.querySelectorAll(".modal-show").forEach(function(element) {
  element.onclick = showModal;
});

document.querySelectorAll(".modal-project-close").forEach(function(element) {
  //закрываем окно на кнопке закрыть
  element.onclick = closeModal;
});

document.querySelectorAll(".modal-wrap").forEach(function(element) {
  //закрываем окно на клике в области серой
  element.onclick = closeModal;
});

function showModal() {
  let modalId = this.dataset.modal;
  if (modalId == "#edit-worker") {
    let id = document.querySelector("#id").textContent;
    ajax("php/worker.php", "post", showEdit, [id]);
  }
  document.querySelector(modalId).classList.remove("hide");
  document.onkeydown = function(event) {
    //закрываем окно на кнопку Esc
    if (event.keyCode == 27) closeModal();
  };
}

function closeModal() {
  document.querySelectorAll(".modal-wrap").forEach(function(element) {
    element.classList.add("hide");
  });
  document.querySelector(".contacts-base").innerHTML = "";
  if (document.querySelector(".select").value == "") {
    take_data();
  } else {
    showUnitWorker(document.querySelector(".select").value);
  }
  document.onkeydown = null;
  document.querySelector("#first_name_add").value = "";
  document.querySelector("#second_name_add").value = "";
  document.querySelector("#last_name_add").value = "";
  document.querySelector("#birthday_add").value = "";
  document.querySelector("#mobile_phone_add").value = "";
  document.querySelector("#inside_phone_add").value = "";
  document.querySelector("#email_add").value = "";
  document.querySelector("#position_add").value = "";
  document.querySelector('#photo_add').value="";
  let instance = M.FormSelect.getInstance(document.getElementById('unit_add'));
  instance.destroy();
  document.getElementById('unit_add').value='';
  instance = M.FormSelect.init(document.getElementById('unit_add'), []);
}

// document.querySelector("#log-in .modal-project").onclick = function(event) {
//   event.stopPropagation();
// };

document.querySelector("#add-new-worker .modal-add").onclick = function(event) {
  event.stopPropagation();
};

document.querySelector("#worker-show .modal-worker").onclick = function(event) {
  event.stopPropagation();
};

document.querySelector("#edit-worker .modal-edit").onclick = function(event) {
  event.stopPropagation();
};

document.addEventListener("DOMContentLoaded", function() {
  var elems = document.querySelectorAll("select");
  let options = {};
  var instances = M.FormSelect.init(elems, options);
});

document.querySelector("#log-out").onclick = () => {
  console.log(document.cookie);
  document.cookie = "email=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
  location.href = "index.html";
};

document.addEventListener("DOMContentLoaded", function() {
  let elems = document.querySelectorAll(".datepicker");
  let options = { format: "yyyy-mm-dd" };
  let instances = M.Datepicker.init(elems, options);
});

document.querySelector("#add-new-worker-btn").onclick = () => {
  if (document.querySelector("#first_name_add").value == "") {
    M.toast({ html: "Введите фамилию" });
  } else if (document.querySelector("#second_name_add").value == "") {
    M.toast({ html: "Введите имя" });
  } else if (document.querySelector("#last_name_add").value == "") {
    M.toast({ html: "Введите отчество" });
  } else if (document.querySelector("#mobile_phone_add").value == "") {
    M.toast({ html: "Введите мобильный телефон" });
  } else if (document.querySelector("#unit_add").value == "") {
    M.toast({ html: "Введите подразделение" });
  } else if (document.querySelector("#position_add").value == "") {
    M.toast({ html: "Введите должность" });
  } else if (document.querySelector("#birthday_add").value == "") {
    M.toast({ html: "Введите дату рождения" });
  } else {
    ajax("php/id.php", "post", showId, ["1"]);
  }
};

function showId(result) {
  result = JSON.parse(result);
  console.log(Number(result[0].id) + 1);
  let id = Number(result[0].id) + 1;
  let data = [
    id,
    document.querySelector("#first_name_add").value,
    encodeURIComponent(document.querySelector("#second_name_add").value),
    encodeURIComponent(document.querySelector("#last_name_add").value),
    encodeURIComponent(document.querySelector("#birthday_add").value),
    encodeURIComponent(document.querySelector("#mobile_phone_add").value),
    encodeURIComponent(document.querySelector("#inside_phone_add").value),
    encodeURIComponent(document.querySelector("#email_add").value),
    encodeURIComponent(document.querySelector("#unit_add").value),
    encodeURIComponent(document.querySelector("#position_add").value)
  ];
  ajax("php/add.php", "post", addNewWorker, data);
  if(document.querySelector('#photo_add').files.length){
  let formData = new FormData();
  formData.append('userfile', document.querySelector('#photo_add').files[0], `${id}.jpg`);
  xhr = new XMLHttpRequest();
xhr.open("POST", "php/upload_photo.php");
xhr.send(formData);
  }
}

function addNewWorker(result) {
  console.log(result);
  if (result == 3) {
    M.toast({ html: "Данные успешно введены" });
    closeModal();
  } else {
    M.toast({ html: "Ошибка, попробуйте еще" });
  }
}

function uploadPhotoResult(result){
  console.log(result);
}

document.querySelector('#delete_photo').onclick=function(){
  document.querySelector('#delete_photo').classList.add('hide');
  document.querySelector('#delete-photo-sure-wrapper').classList.remove('hide');
}

document.querySelector('#delete-photo-no').onclick=function(){
  document.querySelector('#delete-photo-sure-wrapper').classList.add('hide');
  document.querySelector('#delete_photo').classList.remove('hide');
}

document.querySelector('#delete-photo-yes').onclick=function(){
  document.querySelector('#photo_edit_img').classList.add('hide');
  document.querySelector('#photo_edit_form').classList.remove('hide');
  document.querySelector('#delete-photo-sure-wrapper').classList.add('hide');
}

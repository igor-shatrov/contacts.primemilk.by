
function showEdit(data) {
    data = JSON.parse(data);
    document.getElementById("id_edit").innerHTML = data[0].id;
    document.getElementById("first_name_edit").value = data[0].first_name;
    document.getElementById("second_name_edit").value = data[0].second_name;
    document.getElementById("last_name_edit").value = data[0].last_name;
    document.getElementById("mobile_phone_edit").value = data[0].mobile_phone;
    document.getElementById("inside_phone_edit").value = data[0].inside_phone;
    document.getElementById("unit_edit").value = data[0].unit;
    document.getElementById("email_edit").value = data[0].email;
    document.getElementById("position_edit").value = data[0].position;
    document.getElementById("birthday_edit").value = data[0].birthday;
    document.getElementById("photo_edit_img").src = `/photo/${data[0].id}.jpg`;
    let instance = M.FormSelect.getInstance(document.getElementById('unit_edit'));
    instance.destroy();
    document.getElementById('unit_edit').value=data[0].unit;
    instance = M.FormSelect.init(document.getElementById('unit_edit'), []);
    M.updateTextFields();
  }
  
  document.querySelector("#save-worker-btn").onclick = function() {
    let id = document.querySelector("#id_edit").textContent;
    let data = [
      id,
      encodeURIComponent(document.querySelector("#first_name_edit").value),
      encodeURIComponent(document.querySelector("#second_name_edit").value),
      encodeURIComponent(document.querySelector("#last_name_edit").value),
      encodeURIComponent(document.querySelector("#birthday_edit").value),
      encodeURIComponent(document.querySelector("#mobile_phone_edit").value),
      encodeURIComponent(document.querySelector("#inside_phone_edit").value),
      encodeURIComponent(document.querySelector("#email_edit").value),
      encodeURIComponent(document.querySelector("#unit_edit").value),
      encodeURIComponent(document.querySelector("#position_edit").value)
    ];
    ajax("php/update.php", "post", updateWorker, data);
  
    if(document.querySelector('#photo_edit').files.length){
    let formData = new FormData();
    formData.append('userfile', document.querySelector('#photo_edit').files[0], `${id}.jpg`);
    xhr = new XMLHttpRequest();
  xhr.open("POST", "php/upload_photo.php");
  xhr.send(formData);
    }
  };
  
  function updateWorker(result) {
    console.log(result);
    closeModal();
  }

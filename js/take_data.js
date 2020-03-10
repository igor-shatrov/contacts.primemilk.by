document.addEventListener("DOMContentLoaded", take_data);


function take_data(){
    ajax('php/take_data.php','post',show_contacts,'1');
}
function show_contacts(data){
    data = JSON.parse(data);
    
    for (let i=0; i<data.length;i++){
    document.querySelector('.contacts-base').innerHTML+=`
    <div class='col l12 row worker' id="${data[i].id}" onclick="showWorker(${data[i].id})">
    <p class='col l2'>${data[i].first_name}</p>
    <p class='col l2'>${data[i].second_name}</p>
    <p class='col l2'>${data[i].mobile_phone}</p>
    <p class='col l3'>${data[i].email}</p>
    <p class='col l3'>${data[i].position}</p>
    </div>`;
    }
}

function showWorker(id){
    console.log(id);
    document.getElementById('photo').src="";
    document.querySelector('#worker-show').classList.remove('hide');
    document.onkeydown = function (event) {
        //закрываем окно на кнопку Esc
        if (event.keyCode == 27) closeModal();
    }
    ajax('php/worker.php','post',showWorkerData,[id]);
    
}

function showWorkerData(data){
    data = JSON.parse(data);
    document.getElementById('photo').src=`photo/${data[0].id}.jpg`;
    document.getElementById('id').innerHTML=data[0].id;
    document.getElementById('first_name').innerHTML=data[0].first_name;
    document.getElementById('second_name').innerHTML=data[0].second_name;
    document.getElementById('last_name').innerHTML=data[0].last_name;
    document.getElementById('mobile_phone').innerHTML=data[0].mobile_phone;
    document.getElementById('inside_phone').innerHTML=data[0].inside_phone;
    document.getElementById('unit').innerHTML=data[0].unit;
    document.getElementById('email').innerHTML=`<a href="mailto:${data[0].email}">${data[0].email}</a>`;
    document.getElementById('position').innerHTML=data[0].position;
    document.getElementById('birthday').innerHTML=data[0].birthday;
}

document.querySelector('.select').onchange=function(){
    document.querySelector("#search").value="";
    document.querySelector('.contacts-base').innerHTML="";
    showUnitWorker(this.value);
}

function showUnitWorker(unit){
    ajax('php/selectUnit.php','post',show_contacts,[unit]);
}

document.querySelector("#search").oninput = function() {
    let instance = M.FormSelect.getInstance(document.getElementById('main-select'));
    instance.destroy();
    document.getElementById('main-select').value='';
    instance = M.FormSelect.init(document.getElementById('main-select'), []);
    document.querySelector(".contacts-base").innerHTML = "";
    let data = ["first_name", this.value.length, this.value];
    ajax("php/search.php", "post", searchResult, data);
    if (this.value.length != 0) {
      let data = ["second_name", this.value.length, encodeURIComponent(this.value)];
      ajax("php/search.php", "post", searchResult, data);
    }
  };
  
  function searchResult(result) {
    show_contacts(result);
  }

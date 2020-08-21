var pet = document.getElementById("content");

$(document).ready(function() {
    getcat(0);
});

function getcat(id) {
    var htm = new XMLHttpRequest();

    htm.open("POST", "get_pet.php", true);
    htm.onreadystatechange = function() {
        if (htm.readyState === 4 && htm.status === 200) {
            var data = JSON.parse(htm.responseText);
            pet.innerHTML = "";
            for (var obj in data) {
                if (id == 0) {
                    pet.innerHTML += '<div class="card shadow p-3 mb-5 bg-white rounded " style="padding:0px;width: 18rem; margin-right :10px;margin-bottom :20px;"><a href = "petinfo.php?id='+data[obj].pet_id+'" class="card-img-top h-75" style="max-height:294.75px"><img class="card-img-top h-100"  src="img/pet/' + data[obj].pet_pic_url1 + ' " alt="Card image cap" ></a><div class="card-body" style = "margin:0px; padding:0px"></div><a href = "petinfo.php?id='+data[obj].pet_id+'" ><div class="card-footer " style = "background:white;"><p>' + data[obj].pet_name + '</p><p>' + data[obj].pet_status + '</p></div></a></div>';
                } else if (id == data[obj].cat_id) {
                    pet.innerHTML += '<div class="card shadow p-3 mb-5 bg-white rounded " style="padding:0px;width: 18rem; margin-right :10px;margin-bottom :20px;"><a href = "petinfo.php?id='+data[obj].pet_id+'" class="card-img-top h-75"style="max-height:294.75px" ><img class="card-img-top h-100"  src="img/pet/' + data[obj].pet_pic_url1 + ' " alt="Card image cap" ></a><div class="card-body" style = "margin:0px; padding:0px"></div><a href = "petinfo.php?id='+data[obj].pet_id+'" ><div class="card-footer " style = "background:white;"><p>' + data[obj].pet_name + '</p><p>' + data[obj].pet_status + '</p></div></a></div>';
                }
            }
        }
    }
    htm.send(null);
}

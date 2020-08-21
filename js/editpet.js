var xmlHttp;

function createXMLHttpRequest()
{
     if (window.ActiveXObject)
    {
         xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    else
    {
       xmlHttp=new XMLHttpRequest();
    }

}


function stateChange()
{
    if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
    {
        var data = xmlHttp.responseText;
        petfo = data.split("^");
        // petfo[0] is pet_name
        // petfo[1] is pet_gender
        // petfo[2] is pet_color
        // petfo[3] is pet_cat
        // petfo[4] is pet_desc
        // petfo[5] is pet_pic_url1
        // petfo[6] is pet_pic_url2
        // petfo[7] is pet_pic_url3

        document.getElementById('pet_name').value = petfo[0];
        document.getElementById('pet_gender').value = petfo[1];
        document.getElementById('pet_color').value = petfo[2];
        document.getElementById('pet_cate').value = petfo[3];
        document.getElementById('pet_des').value = petfo[4];
        document.getElementById('pet_img1').src = "img/pet/"+petfo[5];
        document.getElementById('pet_img2').src = "img/pet/"+petfo[6];
        document.getElementById('pet_img3').src = "img/pet/"+petfo[7];
        document.getElementById('secretid').value = petfo[8];
        document.getElementById('save_pet').value = "edit";

        console.log(petfo[8]);


    }
}


function editPet(id)
{

    createXMLHttpRequest();
    xmlHttp.onreadystatechange = stateChange;

    var url = "editpet.php";
    url = url + "?pet_id=" + id;

    xmlHttp.open("GET",url,true);
    xmlHttp.send(null);

}



function clearModalPet(){
  document.getElementById('save_pet').value="add";
  document.getElementById('pet_name').value = "";
  document.getElementById('pet_gender').value = "";
  document.getElementById('pet_color').value = "";
  document.getElementById('pet_cate').value = "";
  document.getElementById('pet_des').value = "";
  document.getElementById('pet_img1').src = "img/pet/defult_pet.png";
  document.getElementById('pet_img2').src = "img/pet/defult_pet.png";
  document.getElementById('pet_img3').src = "img/pet/defult_pet.png";
}


function setPath(){
  document.getElementById('pathimg1').value = document.getElementById('pet_img1').src;
  document.getElementById('pathimg2').value = document.getElementById('pet_img2').src;
  document.getElementById('pathimg3').value = document.getElementById('pet_img3').src;
}

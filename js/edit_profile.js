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


function stateChangePopUp()
{
    if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
    {
		var data = xmlHttp.responseText;
        info = data.split("^");
        //info[0] is firstname
        //info[1] is lastname
        //info[2] is gender
        //info[3] is tel
        //info[4] is address
        //info[5] is img name
        //info[6] is user id
        document.getElementById('inputFirstname').value = info[0];
        document.getElementById('inputLastname').value = info[1];
        document.getElementById('inputGender').value = info[2];
        document.getElementById('inputTel').value = info[3];
        document.getElementById('inputAddress').value = info[4];
        document.getElementById('inputImg').src = "img/profile_img/"+info[5];
        document.getElementById('def_pic').value = info[5];
    }
}


function selectProfile(id)
{
    createXMLHttpRequest();
    xmlHttp.onreadystatechange = stateChangePopUp;
    var url = "popup_profile.php";
    url = url + "?id=" + id;

    xmlHttp.open("GET",url,true);
    xmlHttp.send(null);

}


function previewImg(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#inputImg')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

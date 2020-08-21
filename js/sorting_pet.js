var xmlHttp;
var c = 0;
var i =0;


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


function stateChangeSort()
{
    if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
    {
	//	var data =
    var dataResult = JSON.parse(xmlHttp.responseText);
    console.log(dataResult);
    for(item in dataResult){
      document.getElementById("date"+c.toString()).innerHTML=dataResult[item].pet_time_post;
      document.getElementById("pet_img1-"+c.toString()).src ="img/pet/"+dataResult[item].pet_pic_url1;
      document.getElementById("pet_img2-"+c.toString()).src ="img/pet/"+dataResult[item].pet_pic_url2;
      document.getElementById("pet_img3-"+c.toString()).src ="img/pet/"+dataResult[item].pet_pic_url3;
      document.getElementById("pet_name"+c.toString()).innerHTML=dataResult[item].pet_name;
      document.getElementById("pet_gender"+c.toString()).innerHTML=dataResult[item].pet_gender;
      document.getElementById("btnPetID"+c.toString()).value =dataResult[item].pet_id;
           c--;
    }

//     info = data.split(",");
//     while (c>=0) {
// console.log(info);
//
//       document.getElementById("date"+c.toString()).innerHTML=info[i++];
//       document.getElementById("pet_img1-"+c.toString()).src ="img/pet/"+info[i++];
//       document.getElementById("pet_img2-"+c.toString()).src ="img/pet/"+info[i++];
//       document.getElementById("pet_img3-"+c.toString()).src ="img/pet/"+info[i++];
//       document.getElementById("pet_name"+c.toString()).innerHTML=info[i++];
//       document.getElementById("pet_gender"+c.toString()).innerHTML=info[i++];
//       document.getElementById("btnPetID"+c.toString()).value =info[i++];
//       if(info[i]=='END'){
//         break;
//       }
//       c--;
//
//     }
//     i=-1;
//

  }
}


function sortPet(str,id,count)
{
    console.log("sortPet("+str+","+id+","+count+")");
    createXMLHttpRequest();
    xmlHttp.onreadystatechange = stateChangeSort;
    c = parseInt(count-1);
    var url = "sorting_pet.php";
    url = url + "?action=" + str+ "&id="+id;

    xmlHttp.open("GET",url,true);
    xmlHttp.send(null);

}

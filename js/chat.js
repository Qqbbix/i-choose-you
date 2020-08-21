//var ----- Contact -----------------
var current_active_chat = 0;
var first_active = true;
var table_contact = document.getElementById("contact_table");
var row_table = 0;
// ---------------
// ------ Chat ------------------
var active_user = document.getElementById("user_session").value;
var active_room = 0;
var chat_field = document.getElementById("chat_field");
var data_old = -1;
var data_new = 0;
var row_while = 0;
var elmnt = document.getElementById('style-7');


//---------------------------
getContact();
setInterval(function(){ getChat(); }, 1000);
function Active_chat(id,id_head,room){
    if(first_active){
        var active_chat = document.getElementById(id);
        current_active_chat = active_chat;
        active_chat.classList.replace("contactChat","chat-active");
        first_active = false;
        active_room = room;
        document.getElementById("contact_header").innerHTML = document.getElementById(id_head).value;
        console.log("active_room: "+room);
        chat_field.innerHTML = "";
        getChat();
        document.getElementById('style-7').scrollTop = 750;
        
      
       
    }else{
        data_old = -1;
        var active_chat = document.getElementById(id);
        current_active_chat.classList.replace("chat-active","contactChat");
        active_chat.classList.replace("contactChat","chat-active");
        current_active_chat = active_chat;
        active_room = room;
        console.log("active_room: "+room);
        chat_field.innerHTML = "";
        getChat();
        document.getElementById("contact_header").innerHTML = document.getElementById(id_head).value;
    }
}
function getContact(){
    $.ajax({
        type: "POST",
        url: "chat/get_contact.php",
        data: "GET_DATA",
        cache: false,
        success: function (response) {
            
                var dataResult = JSON.parse(response);
                for(i in dataResult){
                    var row = table_contact.insertRow(row_table);
                    row.className = "contactChat";
                    row.id = dataResult[i].contact_id;
                    var cell = row.insertCell(0);
                    cell.innerHTML = "<input type = 'hidden' name = '"+dataResult[i].contact_id+"' id ='1"+dataResult[i].contact_id+"' value = '"+dataResult[i].f_name+" "+dataResult[i].l_name+"'/><div class='p-3 rounded-sm' onclick = 'Active_chat("+dataResult[i].contact_id+",1"+dataResult[i].contact_id+","+dataResult[i].uid_chat+")'><div class = 'row'><div class = 'col-auto'><img src='img/profile_img/"+dataResult[i].pic_url+"' class = 'rounded-circle' width = '45' height = '45'></div><div class = 'col-auto'><h6>"+dataResult[i].f_name+" "+dataResult[i].l_name+"</h6></div></div></div>";
                    row_table++;
                    
                }
               
        }
    });
}

function getChat(){
    $.ajax({
        type: "POST",
        url: "chat/get_chat.php",
        data: {room:active_room},
        cache: false,
        success: function (response) {
           var dataResult = JSON.parse(response);
            data_new = dataResult.length;
            console.log(dataResult);
            console.log("DATA_NEW: "+data_new+" DATA_OLD: "+data_old);
            if(response.statusCode != 201){
                if(data_new > data_old){

                    for(i in dataResult){
                        if(row_while > data_old-1){
                            console.log("sender : "+dataResult[i].sender+"  active_user: "+active_user);
                            if(dataResult[i].sender == active_user){
                                console.log("sender : "+dataResult[i].sender+"  active_user: "+active_user);
                                chat_field.innerHTML += "<div class = 'row'><div class = 'col-12'><div class = 'float-right'><div class = 'shadow p-3 ml-3 mt-4  rounded-pill' style='background-color:#adafff;' width = 'auto'><h5>"+dataResult[i].message+"</h5></div><span class = 'mt-1 float-right'>"+dataResult[i].send_time+"</span></div></div></div>";
                            
                            }else{
                                chat_field.innerHTML +="<div class = 'row'><div ><div class = 'shadow p-3 ml-3 mt-4 bg-white rounded-pill' style='background-color:#FFF;' width = 'auto'><h5>"+dataResult[i].message+"</h5></div><span class = 'mt-1' style = 'float:right;'>"+dataResult[i].send_time+"</span></div></div>";
                            }
                        }
                        //elmnt.scrollTop = 1000;
                        row_while++;
                    }
                    data_old = data_new;
                    row_while = 0;
                }
            }
        }
    });
}
function sentChat(){
    var message = document.getElementById("msg").value;
    $.ajax({
        type: "POST",
        url: "chat/sent_chat.php",
        data: {room:active_room,message:message},
        cache: false,
        success: function (response) {
            document.getElementById("msg").value = "";
            getChat();
        }
    });
}
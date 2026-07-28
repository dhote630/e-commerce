$(document).ready(function(){
  fetchDynamicUi("productes.php");
  $(".access_link").click(function(){
    var page = $(this).attr("pagename");
     fetchDynamicUi(page);
  $("#logoutBtn").click(function(){
    window.location="../login.php";
  })
});

verifyUser();
});

var token = localStorage.getItem("auth_token");
function verifyUser(){
  $.ajax({
    type:"POST",
    url:"http://localhost/E-commerce/admin/api/verifyApi.php",
    data:{
      token:token
    },
    success:function(){

    },
    error:function(){
      window.location="http://localhost/E-commerce/admin/login.php";
    }
  })
}

function fetchDynamicUi(page){
   $.ajax({
        type:"GET",
        url:"http://localhost/E-commerce/admin/pages/"+page,
        success:function(res){
          var box = document.getElementById("admin_area");
          box.innerHTML = res;
          var time = Date.now();
          if(page=="category.php"){
            var scriptTag = document.createElement("SCRIPT");
            scriptTag.src = `http://localhost/E-commerce/admin/js/category.js?cache=${time}`;
            var adminPage = document.getElementById("adminPage");
            adminPage.append(scriptTag);
          }

          if(page=="brands.php"){
            var scriptTag = document.createElement("SCRIPT");
            scriptTag.src =`http://localhost/E-commerce/admin/js/brands.js?cache=${time}`;
             var adminPage = document.getElementById("adminPage");
             adminPage.append(scriptTag);
          }

          if(page=="productes.php"){
            var scriptTag = document.createElement("SCRIPT");
            scriptTag.src = `http://localhost/E-commerce/admin/js/productes.js?cache=${time}`;
            var adminPage = document.getElementById("adminPage");
            adminPage.append(scriptTag);
          }
        }
      })
}

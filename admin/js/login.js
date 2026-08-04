$(document).ready(function(){
  $("#loginForm").submit(function(event){
    event.preventDefault();

    $.ajax({
      type:"POST",
      url:"http://localhost/E-commerce/admin/api/loginApi.php",
      data:{
        email:$("#loginEmail").val(),
        password:$("#loginPass").val()
      },
      beforeSend:function(){
        $("#loginBtn").attr("disabled","disabled");
        $("#loginLoader").removeClass("d-none");
      },
      success:function(res){
        $("#loginBtn").removeAttr("disabled","disabled");
        $("#loginLoader").addClass("d-none");
        var obj = JSON.parse(res);
        var msg = obj.msg;
        var token = obj.token;
        Swal.fire({
          title: "Notification ",
          text: msg,
          icon: "success"
        });
        localStorage.setItem("auth_token",token);
        setTimeout(function(){
          window.location = "pages/adminLayout.php";
        },2000)
      },
      error:function(err){
        $("#loginBtn").removeAttr("disabled","disabled");
        $("#oginLoader").addClass("d-none");
        var msg = err.responseText;
        Swal.fire({
          title: "Notification ",
          text: msg,
          icon: "error"
        });
      }
    })
  })
})

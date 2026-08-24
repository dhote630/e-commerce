$(document).ready(function() {
  $("#loginForm").submit(function(event){
    event.preventDefault();
    $.ajax({
      type:"POST",
      url:"http://localhost/E-commerce/user/api/loginApi.php",
      data:{
        email:$("#loginEmail").val(),
        password:$("#loginPass").val()
      },
      beforeSend:function(){
        $("#loginButton").html("Please Wait...");
        $("#loginButton").attr("disabled","disabled");
      },
      success:function(res){
        $("#loginButton").html("Login");
        $("#loginButton").removeAttr("disabled");
        var obj = JSON.parse(res);
        var token = obj.token;
        localStorage.setItem("user_token",token);
        Swal.fire({
          title: "Authentication",
          text: "Login Success",
          icon: "success"
        });
        setTimeout(function(){
           window.location = 'profile.php';
        },3000);
      },
      error:function(err){
        $("#loginButton").html("Login");
        $("#loginButton").removeAttr("disabled");
        var msg = err.responseText;
        Swal.fire({
          title: "Authentication",
          text: msg,
          icon: "error"
        });
        if(err.status==405){
          $("#loginForm").addClass("d-none");
          $("#VerifyLoginOtpForm").removeClass("d-none");
        }
      }
    })
  });

$("#VerifyLoginOtpForm").submit(function(event){
  event.preventDefault();
  $.ajax({
    type:"POST",
    url:"http://localhost/E-commerce/user/api/verifyOtpApi.php",
    data:{
      email:$("#loginEmail").val(),
      otp:$("#verifyLoginOtp").val()
    },
    success:function(res){
      Swal.fire({
        title: "Otp verification",
        text: res,
        icon: "success"
      });
      $("#VerifyLoginOtpForm").addClass("d-none");
      $("#loginForm").removeClass("d-none");
    },
    error:function(err){
      var msg = err.responseText;
      Swal.fire({
        title: "Otp verification",
        text: msg,
        icon: "error"
      });
    }
  })
})
});

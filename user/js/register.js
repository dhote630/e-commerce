$(document).ready(function(){
  $("#registerForm").submit(function(event){
    event.preventDefault();
    $.ajax({
      type:"POST",
      url:"http://localhost/E-commerce/user/api/registrationApi.php",
      data:{
        fname:$("#fname").val(),
        lname:$("#lname").val(),
        email:$("#email").val(),
        mobile:$("#mobile").val(),
        password:$("#password").val(),
      },
      beforeSend:function(){
        $("#registerationBtn").html("processing");
        $("#registerationBtn").attr("disabled","disabled");
      },
      success:function(res){
        $("#registerationBtn").html("Register");
        $("#registerationBtn").removeAttr("disabled");
        Swal.fire({
          title: "Authentication",
          text: res,
          icon: "success"
        });
        $("#registerForm").addClass("d-none");
        $("#VerifyOtpForm").removeClass("d-none");
      },
      error:function(err){
        $("#registerationBtn").html("Register");
        $("#registerationBtn").removeAttr("disabled");
        var msg = err.responseText;
        console.log(err.responseText);
        Swal.fire({
          title: "Authentication",
          text: msg,
          icon: "error"
        });
      }
    })
  });

  $("#VerifyOtpForm").submit(function(event){
    event.preventDefault();
    $.ajax({
      type:"POST",
      url:"http://localhost/E-commerce/user/api/verifyOtpApi.php",
      data:{
        email:$("#email").val(),
        otp:$("#verifyRegisterOtp").val()
      },
      success:function(res){
        Swal.fire({
          title: "Authentication",
          text: res,
          icon: "success"
        });
        $("#registerForm").removeClass("d-none");
        $("#VerifyOtpForm").addClass("d-none");
      },
      error:function(err){
        var msg = err.responseText;
        Swal.fire({
          title: "Authentication",
          text: msg,
          icon: "error"
        });
      }
    })
  })
});

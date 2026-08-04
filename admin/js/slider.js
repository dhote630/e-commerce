var token = localStorage.getItem("auth_token");

$(document).ready(function(){
  $("#uploadSliderPic").on("change",function(){
    var file = document.getElementById("uploadSliderPic").files[0];
    var blobUrl = URL.createObjectURL(file);
    $("#sliderPic").attr("src",blobUrl);
  });

  $("#title").on("input",function(){
    var title = $(this).val();
    $("#captionTitle").html(title);
  });

  $("#desc").on("input",function(){
    var desc = $("#desc").val();
    $("#captionDesc").html(desc);
  });

  $("#captionDirection").on("change",function(){
    var direction = $(this).val();
    if(direction=='vertical'){
      $("#sliderCaption").css({flexDirection:"column"});
    } else {
      $("#sliderCaption").css({flexDirection:"row"});
    }
  });

  $("#handleVertical").on("change",function(){
    var position = $(this).val();
    $("#sliderCaption").css({alignItems:position});
  });

  $("#handleHorizontal").on("change",function(){
    var position = $(this).val();
    $("#sliderCaption").css({justifyContent:position});
  });

  // $("#txtInput").on("change",function(){
  //   var txtcolor = $(this).val();
  //   $("#captionTitle").css({color:txtcolor});
  //   $("#captionDesc").css({color:txtcolor});
  // });

});

$(document).ready(function(){
  $("#sliderForm").submit(function(event){
     event.preventDefault();
     var file =  document.getElementById("uploadSliderPic").files[0];
     var formdata = new FormData();
     formdata.append("token",token);
     formdata.append("image",file);
     var caption = $("#caption").html();

    $.ajax({
      type:"POST",
      url:"http://localhost/E-commerce/admin/api/uploadImageApi.php",
      data:formdata,
      contentType:false,
      processData:false,
      success:function(res){
        $.ajax({
          type:"POST",
          url:"http://localhost/E-commerce/admin/api/createSliderApi.php",
          data:{
            token:token,
            caption:caption,
            image:res
          },
          success:function(res){
             Swal.fire({
              title: "Notification ",
              text: res,
              icon: "success"
            });
          },
          error:function(err){
            var msg = err.responseText;
            Swal.fire({
              title: "Notification ",
              text: msg,
              icon: "error"
            });
          }
        });
      }
    });

  })
});

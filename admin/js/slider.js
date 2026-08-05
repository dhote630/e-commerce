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

  $(".caption_text").dblclick(function(){
    $(".caption_text").css({borderStyle:"none",padding:0});
    $(this).css({border:"1px dashed black",padding:"2px"});
    $(".caption_text").removeClass("caption_active");
    $(this).addClass("caption_active");
  });

  $("#fontInput").on("input",function(){
    var size = $(this).val();
    console.log(size);
    $(".caption_active").css({fontSize:size+"px"});
    $(".caption_active").css({borderStyle:"none",padding:0});
  });


  $("#txtInput").on("change",function(){
    var txtcolor = $(this).val();
    $(".caption_active").css({color:txtcolor});
    $(".caption_active").css({borderStyle:"none",padding:0});
  });

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
            var form = document.getElementById("sliderForm");
            form.reset();
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

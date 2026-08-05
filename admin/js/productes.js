var token = localStorage.getItem("auth_token");

$(document).ready(function(){
  const quill = new Quill('#editor', {
    theme: 'snow'
  });
});

$(document).ready(function(){
  productBrand()
});

function productBrand() {
  $.ajax({
    type:"GET",
    url:"http://localhost/E-commerce/admin/api/fetchAllBrandApi.php",
    data:{
      token:token
    },
    success:function(res){
      var obj = JSON.parse(res);
      $(obj).map(function(index,item){
        var brandId = item.id;
        var brandName = item.brand_name;
        var option = document.createElement("OPTION");
        option.innerHTML = brandName;
        option.value = brandId;
          $("#brand_list").append(option);
      });

    },
    error:function(err){
     console.log(err);
    }
  })
};

var allProductsPic = {
  front_pic:'',
  back_pic:'',
  left_pic:'',
  right_pic:''
};


$(document).ready(function(){
 $(".product_pic").click(function(){
   var img = $(this);
   var keyname = $(this).attr("keyname");
   var input = document.createElement("INPUT");
   input.type = "file";
   input.click();
   input.onchange = function() {
     var file = input.files[0];
     var blobUrl = URL.createObjectURL(file);
     img.attr("src",blobUrl);
     var formdata = new FormData();
     formdata.append("token",token);
     formdata.append("image",file);
     $.ajax({
       type:"POST",
       url:"http://localhost/E-commerce/admin/api/uploadImageApi.php",
       data:formdata,
       contentType:false,
       processData:false,
       xhr:function(){
         var request = new XMLHttpRequest();
         request.upload.onprogress = function(fileEvent){
           var load  = fileEvent.loaded;
           var total = fileEvent.total;
           var per = (load*100)/total;
           $("#product_progress").css({
             width:per+"%"
           });
           if(per==100){
             $("#product_progress").css({
               width:"0"
             })
           }
         }
         return request;
       },
       success:function(res){
         allProductsPic[keyname]=res;
         console.log(allProductsPic);
       },
       error:function(err){
         console.log(err.responseText);
       }
     })
   }
 })
});

$(document).ready(function(){
  $("#productForm").submit(function(event){
    event.preventDefault();
    if(allProductsPic.front_pic!="" && allProductsPic.back_pic!=""
    &&allProductsPic.left_pic!="" && allProductsPic.right_pic!=""){

      var brandId = $("#brand_list").val();
      var name = $("#name").val();
      var desc = $("#editor").html();
      var price = $("#price").val();
      var qty = $("#qty").val();
      var front = allProductsPic.front_pic;
      var back = allProductsPic.back_pic;
      var left = allProductsPic.left_pic;
      var right = allProductsPic.right_pic;
      var formdata = new FormData();
      formdata.append("token",token);
      formdata.append("brandId",brandId);
      formdata.append("name",name);
      formdata.append("description",desc);
      formdata.append("price",price);
      formdata.append("qty",qty);
      formdata.append("front",front);
      formdata.append("back",back);
      formdata.append("left",left);
      formdata.append("right",right);
      $.ajax({
        type:"POST",
        url:"http://localhost/E-commerce/admin/api/createProductApi.php",
        data:formdata,
        beforeSend:function(){
          $("#productBtn").attr("disabled","disabled");
          $("#productBtn").html("processing...");
        },
        success:function(res){
          Swal.fire({
            title: "Notification ",
            text: res,
            icon: "success"
          });
          $("#productBtn").removeAttr("disabled");
          $("#productBtn").html("Create Product");
          var form = document.getElementById("productForm");
          form.reset();
        },
        error:function(err){
          var msg = err.responseText;
          Swal.fire({
            title: "Notification ",
            text: msg,
            icon: "error"
          });
          $("#productBtn").removeAttr("disabled");
          $("#productBtn").html("Create Product");
        }
      });
    } else {
      alert("upload all images first..");
    }
  })
});

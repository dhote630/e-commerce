var token = localStorage.getItem("auth_token");

$(document).ready(function(){
  $("#brandForm").submit(function(event){
    event.preventDefault();

    $.ajax({
        type:"POST",
        url:"http://localhost/E-commerce/admin/api/createBrandApi.php",
        data:{
          token:token,
          catId:$("#catId").val(),
          brandName:$("#brandName").val()
        },
        success:function(res){
           alert(res);
        },
        error:function(err){
           alert(err.responseText);
        }
    })
  })
});

$(document).ready(function(){
  $.ajax({
    type:"POST",
    url:"http://localhost/E-commerce/admin/api/fetchCategoryApi.php",
    data:{
      token:token
    },
    success:function(res){
        var obj = JSON.parse(res);
        var len = obj.length;
        var design = `<option val=''>--select--</option>`;
        for(i=0;i<len;i++){
        var id = obj[i].Id;
        var name = obj[i].Name;
        design+=`<option val='${id}'>${name}</option>`;

        }
       $("#catId").html(design);
    },
    error:function(err){
      console.log(err);
    }
  })
})

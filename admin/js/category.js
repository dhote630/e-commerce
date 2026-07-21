var token = localStorage.getItem("auth_token");

$(document).ready(function(){
  $("#categoryForm").submit(function(event){
    event.preventDefault();
    $.ajax({
      type:"POST",
      url:"http://localhost/E-commerce/admin/api/createCategoryApi",
      data:{
         token:token,
         category:$("#category").val()
      },
      success:function(res){
         alert("category created");
      },
      error:function(err){
        alert(err.responseText);
        // alert("failed to create category");
      }
    })
  })
})

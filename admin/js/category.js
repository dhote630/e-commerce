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
        Swal.fire({
          title: "Notification ",
          text: res,
          icon: "success"
        });
        fetchCategory();
      },
      error:function(err){
        var msg = err.responseText;
        Swal.fire({
          title: "Notification ",
          text: msg,
          icon: "error"
        });
      }
    })
  })
});

$(document).ready(function(){
  fetchCategory();
})

function fetchCategory(){
  $.ajax({
    type:"GET",
    url:"http://localhost/E-commerce/admin/api/fetchCategoryApi.php",
    data:{
      token:token
    },
    success:function(res){
        var obj = JSON.parse(res);
        var len = obj.length;
        var list = document.getElementById("category_list");
        list.innerHTML = `<tr>
          <td>S/No</td>
          <td>Category</td>
          <td>Action</td>
        </tr>`;
        for(i=0;i<len;i++){
        var id = obj[i].Id;
        var name = obj[i].Name;
        design = `<tr>
          <td>${i+1}</td>
          <td>${name}</td>
          <td>
          <i class="fa fa-edit edit_icon" keyid="${id}"></i>
          <i class="fa fa-trash delete_icon" keyid="${id}"></i></td>
        </tr>`;
        list.innerHTML+=design;
        }

       $(".delete_icon").click(function(){
         var id = $(this).attr("keyid");
         var check = window.prompt("type delete for delete");
         if(check=="delete"){
           $.ajax({
             type:"POST",
             url:"http://localhost/E-commerce/admin/api/deleteCategoryApi.php",
             data:{
               token:token,
               id:id
             },
             success:function(res){
               Swal.fire({
                 title: "Notification ",
                 text: res,
                 icon: "success"
               });
               fetchCategory();
             },
             error:function(err){
               var msg = err.responseText;
               Swal.fire({
                 title: "Notification ",
                 text: msg,
                 icon: "error"
               });
             }
           })
         } else {
           alert("type delete correctly");
         }
       });

       $(".edit_icon").click(function(){
         var id =$(this).attr("keyid");
         var category = $("#category").val();
         $.ajax({
           type:"GET",
           url:"http://localhost/E-commerce/admin/api/getCategoryApi.php",
           data:{
             token:token,
             id:id
           },
           success:function(res){
             var obj = JSON.parse(res);
             var catName = obj.category_name;
             $("#category").val(catName);
             $("#updateBtn").click(function(){
               
             })
           },
           error:function(err){

           }
         })
         // $.ajax({
         //   type:"POST",
         //   url:"http://localhost/E-commerce/admin/api/updateCategoryApi.php",
         //   data:{
         //     token:token,
         //     id:id,
         //     catName:category
         //   },
         //   success:function(res){
         //     Swal.fire({
         //       title: "Notification ",
         //       text: res,
         //       icon: "success"
         //     });
         //     fetchCategory();
         //   },
         //   error:function(err){
         //     var msg = err.responseText;
         //     Swal.fire({
         //       title: "Notification ",
         //       text: msg,
         //       icon: "error"
         //     });
         //   }
         // })
       });
    },
    error:function(err){
      console.log(err);
    }
  })
}

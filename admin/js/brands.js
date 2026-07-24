var token = localStorage.getItem("auth_token");

$(document).ready(function(){
  $("#brandForm").submit(function(event){
    event.preventDefault();
    var catid = $("#catId").val();
    var brand = $("#brandName").val();
    var apiUrl = "http://localhost/E-commerce/admin/api/createBrandApi.php";
    var data = {
      token:token,
      catId:catid,
      brandName:brand
    };
    var btn = $("#createBtn").attr("edit");
     if(btn){
       apiUrl = "http://localhost/E-commerce/admin/api/updateBrandApi.php";
       var check =$("#createBtn").attr("keyid");
       data.brandId = check;
     }

    $.ajax({
        type:"POST",
        url:apiUrl,
        data:data,
        success:function(res){
          Swal.fire({
            title: "Notification ",
            text: res,
            icon: "success"
          });
          $("#createBtn").html("Create Brand");
          $("#createBtn").removeAttr("keyid");
          $("#createBtn").removeAttr("edit");
          fetchBrand();
          var form = document.getElementById("brandForm");
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

  })
});

$(document).ready(function(){
    fetchCategory();
    fetchBrand();
});

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
        var design = `<option value=''>--select--</option>`;
        design.innerHTML="";
        for(i=0;i<len;i++){
        var id = obj[i].Id;
        var name = obj[i].Name;
        design+=`<option value='${id}'>${name}</option>`;

        }
       $("#catId").append(design);

    },
    error:function(err){
      console.log(err);
    }
  })
}

function fetchBrand(){
  $.ajax({
    type:"GET",
    url:"http://localhost/E-commerce/admin/api/fetchAllBrandApi.php",
    data:{
      token:token
    },
    success:function(res){
      var obj = JSON.parse(res);
      var list = document.getElementById("brand_list");
      list.innerHTML = `<tr>
          <td>S/No</td>
          <td>Category</td>
          <td>Brand</td>
          <td>Action</td>
        </tr>`;
     $(obj).map(function(index,item){
       var catId = item.cat_id;
       var category = item.category_name;
       var brand = item.brand_name;
       var brandId = item.id;
       var design = `<tr>
       <td>${index+1}</td>
       <td>${category}</td>
       <td>${brand}</td>
       <td>
       <i class="fa fa-edit edit_icon" keyid='${brandId}'></i>
       <i class="fa fa-trash delete_icon" keyid="${brandId}"></i>
       </td>
       </tr>`;
       list.innerHTML+=design;
     });


     $(".delete_icon").click(function(){
       var id = $(this).attr("keyid");
       var check = window.prompt("type delete for delete");
       if(check=="delete"){
          $.ajax({
            type:"POST",
            url:"http://localhost/E-commerce/admin/api/deleteBrandApi.php",
            data:{
              token:token,
              brandId:id
            },
            success:function(res){
              Swal.fire({
                title: "Notification ",
                text: res,
                icon: "success"
              });
              fetchBrand();
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
       }else {
         window.alert("type delete correctly");
       }
     });

     $(".edit_icon").click(function(){
       var id = $(this).attr("keyid");
       $.ajax({
         type:"GET",
         url:"http://localhost/E-commerce/admin/api/getBrandByIdApi",
         data:{
           token:token,
           id:id
         },
         success:function(res){
           var obj = JSON.parse(res);
           var id = obj.id;
           var brandName = obj.brand_name;
           var catId = obj.cat_id;
           $("#brandName").val(brandName);
           $("#createBtn").html("Save Changes");
           $("#createBtn").attr("edit",true);
           $("#createBtn").attr("keyid",id);
           $("#catId option").each(function(index,item){
             if(item.value==catId){
               $(item).attr("selected","selected");
             } else {
               $(item).removeAttr("selected");
             }
           });
         },
         error:function(err){
           console.log(err);
         }
       })
     })
    },
    error:function(err){
      console.log(err);
    }
  })
}

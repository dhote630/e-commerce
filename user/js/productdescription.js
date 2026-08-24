$(document).ready(function(){
  fetchProductDesc();
});

var token = localStorage.getItem("user_token");
function fetchProductDesc(){
  var link = window.location.href;
  var split = link.split("?id=");
  var id = split[1];
  $.ajax({
    type:"GET",
    url:"http://localhost/E-commerce/user/api/productDescriptionApi.php",
    data:{
      token:token,
      productid:id
    },
    success:function(res){
      var obj = JSON.parse(res);
      var title = obj.title;
      var description = obj.description;
      var price = obj.price;
      var quantity = obj.quantity;
      var front = obj.front_pic;
      var back = obj.back_pic;
      var left = obj.left_pic;
      var right = obj.right_pic;
      var id = obj.id;
      var brand = obj.brand_name;
      var category = obj.category_name;
      var design = `<div class="col-md-6 bg-white shadow-lg p-3">
        <div class="mb-2">
          <img src="http://localhost/E-commerce/admin/productes/${front}"
           style="width:100%;height:350px"/>
        </div>
        <div class="d-flex justify-content-around">
          <div id="smallPic"class="p-2">
          <img src="http://localhost/E-commerce/admin/productes/${front}"
          style="width:100%;height:150px;"/>
          </div>
          <div id="smallPic"class="p-2">
          <img src="http://localhost/E-commerce/admin/productes/${back}"
          style="width:100%;height:150px"/>
          </div>
          <div id="smallPic" class="p-2">
          <img src="http://localhost/E-commerce/admin/productes/${left}"
          style="width:100%;height:150px"/>
          </div>
          <div id="smallPic"class="p-2">
          <img src="http://localhost/E-commerce/admin/productes/${right}"
          style="width:100%;height:150px"/>
          </div>
        </div>
      </div>
      <div class="col-md-6 bg-white shadow-lg">
      <h3>${title}</h3>
      <p><strong> brand :</strong> ${brand} | <strong> category </strong> ${category}</p>
      <p><strong> Price : </strong><i class="fa fa-rupee"></i>${price}</p>
      ${description}
      <div class="m-2">
      <label>Enter Quantity</label>
      <input value="1" class="form-control"
      style="width:50%"/>
      </div>
      <div class="mb-2">
      <h5>Select Payment Method</h5>
      <input type="radio" name="paymentoption"/> Online
      <input type="radio" name="paymentoption"/> COD
      </div>
      <button class="btn btn-dark buy_btn"> Buy </button>
      </div>`;
      var box = document.getElementById("productUi");
      box.innerHTML = design;

      $(".buy_btn").click(function(){
        $("#addressModal").modal("show");
        $("#addressForm").submit(function(e){
          e.preventDefault();
          var formdata = new FormData(e.target);
          formdata.append("token",token);
          $.ajax({
            type:"POST",
            url:"http://localhost/E-commerce/user/api/createAddressApi.php",
            data:formdata,
            contentType:false,
            processData:false,
            success:function(res){
              Swal.fire({
                title: "Notification",
                text: res,
                icon: "success"
              });
              setTimeout(function(){
                   window.location="http://localhost/E-commerce/payment/index.php";
              },3000);

            },
            error:function(err){
              var msg = err.responseText;
              Swal.fire({
                title: "Notification",
                text: res,
                icon: "error"
              });
            }
        });

        })


      });
    },
    error:function(err){
      console.log(err);
    }
  });
}

$(document).ready(function(){
 fetchCarts();
});

var token = localStorage.getItem("user_token");
 function fetchCarts(){
   $.ajax({
     type:"GET",
     url:"http://localhost/E-commerce/user/api/cartsApi.php",
     data:{
       token:token
     },
     success:function(res){
       var obj = JSON.parse(res);
      console.log(obj);
      var box = document.getElementById("cart_result");
      $(obj).map(function(index,item){
        var title = item.title;
        var description = item.description;
        var price = item.price;
        var qnt = item.qnt;
        var pic = item.front_pic;
        var productId = item.productsid;
        var design = `<div class="row bg-white shadow-lg mb-2">
          <div class="col-md-4 p-3">
            <image src="http://localhost/E-commerce/admin/productes/${pic}"
            style="height:300px;width:100%"/>
          </div>
          <div class="col-md-4">
            <h3>${title}</h3>
            <p>${price}</p>
            <p>${qnt}</p><p>Total Amount = ${price*qnt}</p>
            ${description}
            <div class="mt-2">
            <button class="btn btn-danger cart_buy_btn" productid="${productId}">Buy Now</button>
            <button class="btn btn-dark">Remove to cart</button>
            </div>
          </div>
        </div>`;
        box.innerHTML+=design;
      });
      $(".cart_buy_btn").click(function(){
        var productId = $(this).attr("productid");
        window.location = "http://localhost/E-commerce/user/pages/productdescription.php?id="+productId;
      });
     },
     error:function(err){
       if(err.status==401){
         window.location = "http://localhost/E-commerce/index.php";
       }
     }
   })
 }

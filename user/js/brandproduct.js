var brandid = window.location.href.split("=");
$(document).ready(function(){
  fetchBrandProducts();
});

function fetchBrandProducts(){
 $.ajax({
   type:"GET",
   url:"http://localhost/E-commerce/user/api/fetchProductsByBrandApi.php?brandid="+brandid[1],
   success:function(res){
    var obj = JSON.parse(res);
    // console.log(obj);
    var box = document.getElementById("products");
    box.innerHTML = '';
    $(obj).map(function(index,item){
      console.log(item);
      var id =item.id;
      var title = item.title;
      var price = item.price;
      var desc = item.description;
      var pic = "http://localhost/E-commerce/admin/productes/"+item.front_pic;
      var design = `
      <div class="col-md-3 my-2 p-2">
       <div class="card">
         <div class="card-body" id="cardBody">
           <img src="${pic}" alt="${title}" id="pic">
           <h3 class="p-0 m-0" id="title">${title}</h3>
           <p class="p-0 m-0" id="price"><i class="fa fa-rupee"></i>${price}</p>
           ${desc}
         </div>
       <div class="card-footer d-flex justify-content-between align-items-center">
       <button class="product_btn" productkey="${id}"> Add To Cart </button>
       <button class="product_btn" productkey="${id}"> Buy Now </button>
       </div>
      </div>
      </div>`;
      box.innerHTML+=design;
    })
   }
 })
}

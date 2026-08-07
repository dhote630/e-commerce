$(document).ready(function(){
  fetchSliders();
  fetchAllProductes();
})

function fetchSliders(){
  $.ajax({
    type:"GET",
    url:"http://localhost/E-commerce/user/api/fetchSliderApi.php",
    success:function(res){
      var obj = JSON.parse(res);
      var carousel = document.getElementById('carousel');

      $(obj).map(function(index,item){
        var caption = item.caption;
        var imagePath = "http://localhost/E-commerce/admin/productes/"+item.image_path;
        console.log(item);
        var design = `
        <div class="carousel-item ${index==0 ? 'active' : ''}" data-bs-interval="2000">
          <img src="${imagePath}" class="d-block" style="width:100%;height:600px"/>
          ${caption}
        </div>
        `
         carousel.innerHTML+=design;
      });


    },
    error:function(err){
      console.log(err);
    }
  })
}

function fetchAllProductes() {
  $.ajax({
    type:"GET",
    url:"http://localhost/E-commerce/user/api/fetchProductBrandApi.php",
    success:function(res){
      var obj = JSON.parse(res);
      var box = document.getElementById('product_box');
      $(obj).map(function(index,item){
        var title =item.title;
        var pic = item.front_pic;
        var price =item.price;
        var title =item.title;
        var design = ` <div class="col-md-3 my-2 p-2">
           <div class="card">
             <div class="card-body" id="containerBox">
               <img src="http://localhost/E-commerce/admin/productes/${pic}" id="product_pic">
               <h3>${title}</h3>
               <p><i class="fa fa-rupee"></i>${price}</p>
             </div>
             <div class="card-footer d-flex justify-content-between align-items-center" >
               <button class="productBtn">Add To Cart</button>
               <button class="productBtn">Buy Now</button>
             </div>
           </div>
         </div>`;
         box.innerHTML+= design;
      })
    }
  })
}

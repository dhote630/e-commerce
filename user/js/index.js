$(document).ready(function(){
  fetchSliders();
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

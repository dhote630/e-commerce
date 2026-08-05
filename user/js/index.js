$(document).ready(function(){
  fetchSliders();
})

function fetchSliders(){
  $.ajax({
    type:"GET",
    url:"http://localhost/E-commerce/user/api/fetchSliderApi.php",
    success:function(res){
      var obj = JSON.parse(res);
      var inner = $("#carouselBox");

      $(obj).map(function(index,item){
        var caption = item.caption;
        var imagePath = item.image_path;
        console.log(item);
        var design = `
        <div class="carousel-item active">
          <img src="http://localhost/E-commerce/admin/productes/+${imagePath}" style="width:100%"/>
          ${caption}
        </div>
        `
         inner.innerHTML+=design;
        // var design = document.createElement("DIV");
        // var img = document.createElement("IMG");
        // $(img).attr("src","http://localhost/E-commerce/admin/productes/"+imagePath);
        // $(design).addClass("carousel-item active");
        // $(design).append(img);
        // // $(design).html(caption);
        // $(inner).append(design);
      });


    },
    error:function(err){
      console.log(err);
    }
  })
}

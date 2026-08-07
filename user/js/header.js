$(document).ready(function(){
  fetchAllCategoryBrands();
});

function fetchAllCategoryBrands() {
$.ajax({
  type:"GET",
  url:"http://localhost/E-commerce/user/api/categoryBrandApi.php",
  success:function(res){
    var obj = JSON.parse(res);
    var menu = document.getElementById("headerMenu");
    var numIndex = 0;
    $(obj).map(function(index,item){
      if(item.brands!=null) {
        var allBrands = item.brands.split(",");
        // console.log(allBrands);
        // console.log(item);
        var category = item.category_name;
        var design = `<li class="nav-item dropdown">
        <a class="nav-link text-white" data-bs-toggle="dropdown">${category}</a>
        <ul class="dropdown-menu brand_dropdown">

        </ul>
        </li>`
        menu.innerHTML+=design;
        var brands = document.getElementsByClassName("brand_dropdown");
        // console.log(brands);
        allBrands.map(function(name,i){
        // console.log(name);
        var brand = name.split("=");
        brands[numIndex].innerHTML+= `
          <li keyid="${brand[1]}" class="brand_dropdown_item" > <a class="dropdown-item" > ${brand[0]}</a></li>
        `
      });
      numIndex = numIndex+1;
      $(".brand_dropdown_item").click(function(){
        var brandid = $(this).attr("keyid");
        window.location="http://localhost/E-commerce/user/pages/brandproduct.php?brandid="+brandid;

      })
     }
    });
  },
  error:function(err){
  console.log(err.responseText);
  }
})
}

$(document).ready(function(){
  $("#registerBtn").click(function(){
    window.location="http://localhost/E-commerce/user/pages/register.php";
  });
});

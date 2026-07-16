$(document).ready(function(){
  $(".access_link").click(function(){
    var page = $(this).attr("pagename");

    $.ajax({
      type:"GET",
      url:"http://localhost/E-commerce/admin/pages/"+page,
      success:function(res){
        var box = document.getElementById("admin_area");
        box.innerHTML = res;
      }
    })
  })
})

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewpage" content="width-device-width, initial-scale-1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-4.0.0.js" integrity="sha256-9fsHeVnKBvqh3FB2HYu7g2xseAZ5MlN6Kz/qnkASV8U=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://localhost/E-commerce/user/css/index.css?cache=<?php echo time(); ?>">
  </head>
  <body>
    <?php include('user/pages/header.php') ?>
   <div class="container-fluid px-0">
     <div class="carousel slide" data-bs-ride="carousel">
       <div class="carousel-inner">

         <div class="carousel-item active">
           <img src="https://www.w3schools.com/bootstrap/ny.jpg" alt="Pratiksha" class="d-block"
            style="width:100%;height:577px"/>
           <div class="carousel-caption" id="sliderCaption">
             <h3 class="text-white">Pravina</h3>
             <p class="text-white">student at polytechnic college</p>
           </div>
         </div>

         <div class="carousel-item">
           <img src="https://www.w3schools.com/bootstrap/chicago.jpg" alt='Kashish' class="d-block"
            style="width:100%;height:577px"/>
           <div class="carousel-caption">
             <h3 class="text-white">Kashish Dawande</h3>
             <p class="text-white">Student</p>
           </div>
         </div>

         <div class="carousel-item">
           <img src="https://www.w3schools.com/bootstrap5/la.jpg"
           alt="Pravina" class="d-block" style="width:100%;height:577px"/>
           <div class="carousel-caption">
             <h3 class="text-white">kashish dawande</h3>
             <p class="text-white">khushiiiiiiii</p>
           </div>
         </div>
       </div>
     </div>
   </div>
     <?php include('user/pages/footer.php') ?>
     <script src="user/js/header.js?cache=<?php echo time(); ?>"></script>
  </body>
</html>

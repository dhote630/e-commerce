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
    <link rel="stylesheet" href="http://localhost/E-commerce/user/css/header.css?cache=<?php echo time(); ?>">
  </head>
  <body>
    <?php include('http://localhost/E-commerce/user/pages/header.php') ?>

    <div class="container-fluid">
      <div class="row my-2 p-4">
        <div class="col-md-4 mx-auto p-3" style="background:pink">
         <form>
          <h2 class="text-center text-white">Registration</h2>
          <div class="mb-2">
            <label>Enter First Name</label>
            <input class="form-control">
          </div>
          <div class="mb-2">
            <label>Enter Last Name</label>
            <input class="form-control">
          </div>
          <div class="mb-2">
            <label>Enter Email</label>
            <input class="form-control">
          </div>
          <div class="mb-2">
            <label>Enter Mobile</label>
            <input class="form-control">
          </div>
          <div class="mb-3">
            <label>Enter Password</label>
            <input class="form-control">
          </div>
          <div class="mb-2">
            <button style="height:30px;width:100px;border:1px solid gray">Register</button>
          </div>
         </form>
        </div>
      </div>
    </div>

   </div>
     <?php include('http://localhost/E-commerce/user/pages/footer.php') ?>
     <script src="http://localhost/E-commerce/user/js/register.js?cache=<?php echo time(); ?>"></script>
     <script src="http://localhost/E-commerce/user/js/index.js?cache=<?php echo time(); ?>"></script>
     <script src="http://localhost/E-commerce/user/js/header.js?cache=<?php echo time(); ?>"></script>
  </body>
</html>

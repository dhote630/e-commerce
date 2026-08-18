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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>
    <?php include('http://localhost/E-commerce/user/pages/header.php') ?>

    <div class="container-fluid">
      <form id="loginForm">
        <div class="mx-auto p-3 mt-5" style="background:pink;width:350px;">
          <h2 class="text-center text-white">Login</h2>
          <div class="mb-1">
            <label>Enter Your Email</label>
            <input class="form-control" id="loginEmail">
          </div>
          <div class="mb-1">
            <label>Enter Your Password</label>
            <input class="form-control" id="loginPass">
          </div>
          <div class="mb-2">
            <button style="height:30px;width:100px;border:1px solid gray" id="loginButton">Login</button>
          </div>
          </div>
         </form>

         <form id="VerifyLoginOtpForm" class="my-2 mt-3 d-none" >
           <div class="mx-auto p-3" style="background:pink;width:350px">
             <label>Verify Your Otp</label>
             <input class="form-control" type="password" placeholder="type otp here" id="verifyLoginOtp"/>
           <div class="mb-1 mt-2">
             <button style="height:30px;width:100px;border:1px solid gray" >Verify</button>
           </div>
           </div>
         </form>

    </div>

   </div>
     <?php include('http://localhost/E-commerce/user/pages/footer.php') ?>
     <script src="http://localhost/E-commerce/user/js/login.js?cache=<?php echo time(); ?>"></script>
     <script src="http://localhost/E-commerce/user/js/header.js?cache=<?php echo time(); ?>"></script>
  </body>
</html>

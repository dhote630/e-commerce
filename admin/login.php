<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/login.css?cache=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-4.0.0.js" integrity="sha256-9fsHeVnKBvqh3FB2HYu7g2xseAZ5MlN6Kz/qnkASV8U=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>
   <div id="loginBox">
     <h2 class="text-center">Login Admin pannal</h2>
     <form id="loginForm">
      <div class="mb-3">
        <label>Enter Email</label>
        <input class="form-control" id="loginEmail"/>
      </div>
      <div class="mb-3">
        <label>Enter Password</label>
        <input class="form-control" id="loginPass"/>
      </div>
      <div class="mb-3">
         <button class="btn btn-dark rounded-0" id="loginBtn">Login</button>
      </div>
      <div class="d-flex justify-content-center">
       <div class="loader d-none" id="loginLoader"></div>
      </div>
     </form>
   </div>
   <script src="js/login.js?cache=<?php echo time(); ?>"></script>
  </body>
</html>

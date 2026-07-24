<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../css/adminLayout.css?cache=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-4.0.0.js" integrity="sha256-9fsHeVnKBvqh3FB2HYu7g2xseAZ5MlN6Kz/qnkASV8U=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body id="adminPage">
    <div class="container-fluid p-0 d-flex">
      <div id="left_menu">
        <div class="text-center text-white d-flex flex-column  align-items-center pt-3">
          <i class="fa fa-user-circle-o" id="userIcon"></i>
          <h3>Hi Admin</h3>
        </div>
        <p class="p-0 m-0 text-center text-white">
          <i class="fa fa-envelope"></i>kashish@gmail.com
        </p>

        <ul class="nav navbar-nav">
          <li class="nav-item px-3 access_link" pagename="category.php">
            <a href="#" class="nav-link text-white">Create Category</a>
          </li>
          <li class="nav-item px-3 access_link" pagename="brands.php">
            <a href="#" class="nav-link text-white">Create Brands</a>
          </li>
          <li class="nav-item px-3 access_link" pagename="productes.php">
            <a href="#" class="nav-link text-white">Create Productes</a>
          </li>
        </ul>
      </div>
      <div id="right_menu">
        <div id="header" class="d-flex justify-content-between align-items-center px-2">
          <div>
            <button class="btn btn-sm rounded-0">
              <i class="fa fa-align-justify"></i>
            </button>
          </div>
          <div>
            <button class="btn btn-primary rounded-0" id="logoutBtn">
              <i class="fa fa-sign-out"></i>
              Logout</button>
          </div>
        </div>

        <!-- admin area -->
        <div class="p-4">
           <div class="container-fluid bg-white p-5" id="admin_area">
           </div>
        </div>
      </div>
    </div>
   <script src="../js/adminLayout.js?cache=<?php echo time(); ?>"></script>
  </body>
</html>

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
      <div class="row" id="productUi">

      </div>
    </div>

    <div class="modal" id="addressModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <form id="addressForm">
              <div class="mb-2">
                <label>Enter City</label>
                <input class="form-control" name='city'/>
              </div>
              <div class="mb-2">
                <label>Enter State</label>
                <input class="form-control" name='state'/>
              </div>
              <div class="mb-2">
                <label>Enter Pincode</label>
                <input class="form-control" name='pincode'/>
              </div>
              <div class="mb-2">
                <label>Enter Country</label>
                <input class="form-control" name='country'/>
              </div>
              <div class="mb-2">
                <label>Enter Landmark</label>
                <input class="form-control" name='landmark'/>
              </div>
              <button class="btn btn-dark">save</button>
            </form>
          </div>
        </div>
      </div>
    </div>

     <?php include('http://localhost/E-commerce/user/pages/footer.php') ?>
     <script src="http://localhost/E-commerce/user/js/header.js?cache=<?php echo time(); ?>"></script>
        <script src="http://localhost/E-commerce/user/js/productdescription.js?cache=<?php echo time(); ?>"></script>
  </body>
</html>

<?php
session_start();
if(!isset($_SESSION['user'])){
  echo "<script>alert('Mohon Login Terlebih Dahulu')</script>";
  echo "<script>window.location.href='login'</script>";
}
require_once '../Models/Item.php';
require_once '../Helper/Database.php';

use Models\Item;

$item = new Item();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>MaiShop | Checkout</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="../assets/mdb/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="../assets/mdb/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="../assets/mdb/css/style.min.css" rel="stylesheet">
  <!-- JQuery -->
  <script type="text/javascript" src="../assets/mdb/js/jquery-3.4.1.min.js"></script>
  <script>
    $(document).ready(function(){
        $("input[type='radio']").click(function(){
            var radioValue = $("input[name='paymentMethod']:checked").val();
            if(radioValue){
              document.getElementById("hasil").value = radioValue;
            }
        });
    });
  </script>
</head>

<body class="grey lighten-3">

  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand waves-effect" target="_blank">
        <strong class="blue-text">MaiShop</strong>
      </a>

      <!-- Collapse -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Left -->
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link waves-effect" href="../index">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" href="#">Buat Toko</a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" href="#">About Us</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link waves-effect" href="https://mdbootstrap.com/docs/jquery/getting-started/download/"
              target="_blank">Free download</a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" href="https://mdbootstrap.com/education/bootstrap/" target="_blank">Free
              tutorials</a>
          </li> -->
        </ul>

        <!-- Right -->
        <ul class="navbar-nav nav-flex-icons">
          <li class="nav-item">
            <a class="nav-link waves-effect" href="detail-cart">
              <span class="badge red z-depth-1 mr-1"> 1 </span>
              <i class="fas fa-shopping-cart"></i>
              <span class="clearfix d-none d-sm-inline-block"> Cart </span>
            </a>
          </li>
          <li class="nav-item">
            <?php
            if (isset($_SESSION['user'])) {
              echo "<a href='Views/login' class='nav-link border border-light rounded waves-effect'>
            <i class='fas fa-user-circle mr-2'></i>
              " . $_SESSION['user']['nama'] . "
            </a>";
            } else {
              echo "<a href='Views/login' class='nav-link border border-light rounded waves-effect'>
            <i class='fas fa-user-circle mr-2'></i>
              Login / Signup
            </a>";
            }
            ?>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" href="../Controllers/users/user_logout">
              <i class="fas fa-sign-out-alt"></i>
              <span class="clearfix d-none d-sm-inline-block"> Logout </span>
            </a>
          </li>
        </ul>

      </div>

    </div>
  </nav>
  <!-- Navbar -->

  <!--Main layout-->
  <main class="mt-5 pt-4">
    <div class="container wow fadeIn">

      <!-- Heading -->
      <h2 class="my-5 h2 text-center">Checkout form</h2>

      <!--Grid row-->
      <div class="row">

        <!--Grid column-->
        <div class="col-md-8 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card content-->
            <form class="card-body" action="../Controllers/item/checkout.php" method="post">

              <!--Grid row-->
              <div class="row">

                <!--Grid column-->
                <div class="col-md-12 mb-2">

                  <!--firstName-->
                  <div class="md-form ">
                    <input type="text" name="nama" id="firstName" class="form-control" value="<?php echo $_SESSION['user']['nama'];?>" readonly>
                    <input type="hidden" name="id_user" id="firstName" class="form-control" value="<?php echo $_SESSION['user']['id'];?>" readonly>
                    <label for="firstName" class="">Nama Lengkap</label>
                  </div>

                </div>
                <!--Grid column-->
              </div>
              <!--Grid row-->

              <!--address-->
              <div class="md-form mb-5">
                <input type="text" name="alamat" id="address" class="form-control" placeholder="1234 Main St" value="<?php echo $_SESSION['user']['alamat'];?>" required>
                <label for="address" class="">Alamat Tujuan</label>
              </div>

              <div class="custom-control custom-checkbox">
                <input onselect="" type="checkbox" class="custom-control-input" id="save-info">
                <label class="custom-control-label" for="save-info">Save this information for next time</label>
              </div>
                            
              <div class="d-block my-3">
                <div class="custom-control custom-radio">
                  <input id="indomaret" name="paymentMethod" type="radio" class="custom-control-input" value="Indomaret" checked required>
                  <label class="custom-control-label" for="indomaret">Indomaret</label>
                </div>
                <div class="custom-control custom-radio">
                  <input id="ovo" name="paymentMethod" type="radio" class="custom-control-input" value="Ovo" required>
                  <label class="custom-control-label" for="ovo">Ovo</label>
                </div>
                <div class="custom-control custom-radio">
                  <input id="gopay" name="paymentMethod" type="radio" class="custom-control-input" value="Gopay" required>
                  <label class="custom-control-label" for="gopay">GoPay</label>
                </div>
                <div class="custom-control custom-radio">
                  <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" value="Paypa" required>
                  <label class="custom-control-label" for="paypal">Paypal</label>
                </div>
                <div class="custom-control custom-radio">
                  <input id="transfer" name="paymentMethod" type="radio" class="custom-control-input" value="Transfer" required>
                  <label class="custom-control-label" for="transfer">Transfer</label>
                </div>
                <input type="hidden" name="metode" id="hasil">
              </div>
              <div class="md-form mb-5">
                <input type="text" name="komentar" id="komentar" class="form-control" placeholder="1234 Main St" required>
                <label for="komentar" class="">Komentar</label>
              </div>
              <div class="md-form mb-5">
                <input type="number" name="rating" id="rating" class="form-control" placeholder="5" max="5" required>
                <label for="rating" class="">Rating</label>
              </div>
              <button name="addco" class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>

            </form>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-4 mb-4">

          <!-- Heading -->
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">3</span>
          </h4>

          <!-- Cart -->
          <ul class="list-group mb-3 z-depth-1">
            <?php
            $total=0;
            $result = $item->indexCart($_SESSION['user']['id']);
            $result_cart = $result['data'];
            foreach($result_cart as $x){
              ?>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0"><?php echo $x['nama'];?></h6>
                <small class="text-muted">(<?php echo $x['jumlah'];?>)</small>
                <small class="text-muted"><?php echo $x['keterangan'];?></small>
              </div>
              <span class="text-muted">IDR <?php echo $x['harga'];?> /Item</span>
            </li>
            <?php
            $total+=($x['harga']*$x['jumlah']);
            }
            ?>
            <!-- <li class="list-group-item d-flex justify-content-between bg-light">
              <div class="text-success">
                <h6 class="my-0">Promo code</h6>
                <small>EXAMPLECODE</small>
              </div>
              <span class="text-success">-$5</span>
            </li> -->
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (IDR)</span>
              <strong>IDR <?php echo $total;?></strong>
            </li>
          </ul>
          <!-- Cart -->

          <!-- Promo code -->
          <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Promo code" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-secondary btn-md waves-effect m-0" type="button">Redeem</button>
              </div>
            </div>
          </form>
          <!-- Promo code -->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

    </div>
  </main>
  <!--Main layout-->

  <!--Footer-->
  <footer class="page-footer text-center font-small mt-4 wow fadeIn">

        <hr class="my-4">

    <!-- Social icons -->
    <div class="pb-4">
      <a href="https://www.facebook.com/mdbootstrap" target="_blank">
        <i class="fab fa-facebook-f mr-3"></i>
      </a>

      <a href="https://twitter.com/MDBootstrap" target="_blank">
        <i class="fab fa-twitter mr-3"></i>
      </a>

      <a href="https://www.youtube.com/watch?v=7MUISDJ5ZZ4" target="_blank">
        <i class="fab fa-youtube mr-3"></i>
      </a>

      <a href="https://plus.google.com/u/0/b/107863090883699620484" target="_blank">
        <i class="fab fa-google-plus-g mr-3"></i>
      </a>

      <a href="https://dribbble.com/mdbootstrap" target="_blank">
        <i class="fab fa-dribbble mr-3"></i>
      </a>

      <a href="https://pinterest.com/mdbootstrap" target="_blank">
        <i class="fab fa-pinterest mr-3"></i>
      </a>

      <a href="https://github.com/mdbootstrap/bootstrap-material-design" target="_blank">
        <i class="fab fa-github mr-3"></i>
      </a>

      <a href="http://codepen.io/mdbootstrap/" target="_blank">
        <i class="fab fa-codepen mr-3"></i>
      </a>
    </div>
    <!-- Social icons -->

    <!--Copyright-->
    <div class="footer-copyright py-3">
      © 2019 Copyright:
      <a href="https://mdbootstrap.com/education/bootstrap/" target="_blank"> MDBootstrap.com </a>
    </div>
    <!--/.Copyright-->

  </footer>
  <!--/.Footer-->
<script>
  function cek(){
    var radios = document.getElementsByName('paymentMethod');
for (var i = 0, length = radios.length; i < length; i++) {
  if (radios[i].checked) {
    // do whatever you want with the checked radio
    document.getElementById("hasil").value = radios[i].value;

    // only one radio can be logically checked, don't check the rest
    break;
  }
} 
  }
</script>
  <!-- SCRIPTS -->
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="../assets/mdb/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="../assets/mdb/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="../assets/mdb/js/mdb.min.js"></script>
  <!-- Initializations -->

  <script type="text/javascript">
    // Animations initialization
    new WOW().init();
  </script>
</body>

</html>

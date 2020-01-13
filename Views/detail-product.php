<?php
session_start();
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
  <title>MaiShop | Detail Product</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/framework/fontawesome/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="../assets/mdb/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="../assets/mdb/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="../assets/mdb/css/style.min.css" rel="stylesheet">
  <link href="../assets/mdb/css/style.css" rel="stylesheet">
  <!-- animate CSS -->
  <link rel="stylesheet" href="../assets/winter/css/animate.css">
  <!-- owl carousel CSS -->
  <link rel="stylesheet" href="../assets/winter/css/owl.carousel.min.css">
  <link rel="stylesheet" href="../assets/winter/css/lightslider.min.css">
  <!-- font awesome CSS -->
  <link rel="stylesheet" href="../assets/winter/css/all.css">
  <!-- flaticon CSS -->
  <link rel="stylesheet" href="../assets/winter/css/flaticon.css">
  <link rel="stylesheet" href="../assets/winter/css/themify-icons.css">
  <!-- font awesome CSS -->
  <link rel="stylesheet" href="../assets/winter/css/magnific-popup.css">
  <!-- swiper CSS -->
  <link rel="stylesheet" href="../assets/winter/css/slick.css">
  <!-- <link rel="stylesheet" href="assets/winter/css/style.css"> -->
  <style type="text/css">
    html,
    body,
    header,
    .carousel {
      height: 60vh;
    }

    @media (max-width: 740px) {

      html,
      body,
      header,
      .carousel {
        height: 100vh;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {

      html,
      body,
      header,
      .carousel {
        height: 100vh;
      }
    }
  </style>
</head>

<body>

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

  <!--Carousel Wrapper-->
  <div id="carousel-example-1z" class="carousel slide carousel-fade pt-4" data-ride="carousel">

    <!--Indicators-->
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-1z" data-slide-to="1"></li>
      <li data-target="#carousel-example-1z" data-slide-to="2"></li>
    </ol>
    <!--/.Indicators-->

    <!--Slides-->

    <!--Main layout-->
    <!-- <main> -->
  <?php
  if(isset($_GET['id'])){
  $result = $item->indexID($_GET['id']);
  $item = $result['data'];
  
  ?>
        <!--================Single Product Area =================-->
        <div class="product_image_area section_padding">
          <div class="container">
            <div class="row s_product_inner">
              <div class="col-lg-5">
                <div class="product_slider_img">
                  <div id="vertical">
                    <div data-thumb="../assets/winter/img/product_details/prodect_details_1.png">
                      <img src="../assets/winter/img/product_details/prodect_details_1.png" />
                    </div>
                    <div data-thumb="../assets/winter/img/product_details/prodect_details_2.png">
                      <img src="../assets/winter/img/product_details/prodect_details_2.png" />
                    </div>
                    <div data-thumb="../assets/winter/img/product_details/prodect_details_3.png">
                      <img src="../assets/winter/img/product_details/prodect_details_3.png" />
                    </div>
                    <div data-thumb="../assets/winter/img/product_details/prodect_details_4.png">
                      <img src="../assets/winter/img/product_details/prodect_details_4.png" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-5 offset-lg-1">
                <div class="s_product_text">
                  <h3><?php echo $item["nama"]; ?></h3>
                  <h2><?php echo $item['harga']; ?></h2>
                  <!-- <php var_dump($item);?> -->
                  <ul class="list">
                    <li>
                      <a class="active" href="#">
                        <span>Category</span> : <?php echo $item['nama_category']; ?></a>
                    </li>
                    <li>
                      <a href="#"> <span>Availibility</span> : <?php if($item['stok']>0){echo "In Stock";}else{echo "Product Out Stock";}?></a>
                    </li>
                  </ul>
                  <p>
                  <?php echo $item['keterangan']; ?>
                  </p>
                  <form action="../Controllers/item/addcart" method="post">
                  <div class="card_area">
                    <div class="product_count d-inline-block">
                      <span class="inumber-decrement"> <i class="ti-minus"></i></span>
                      <input class="input-number" name="jumlah" type="text" value="1" min="0" max="10">
                      <span class="number-increment"> <i class="ti-plus"></i></span>
                    </div>
                    <div class="add_to_cart">
                      <input type="hidden" name="id_item" value="<?php echo $item['id']; ?>">
                      <input type="hidden" name="id_user" value="<?php echo $_SESSION['user']['id']; ?>">
                      <button type="submit" name="addcart" class="btn_3">add to cart</button>
                      <a href="#" class="like_us"> <i class="ti-heart"></i> </a>
                      </form>
                    </div>
                    <div class="social_icon">
                      <a href="#" class="fb"><i class="ti-facebook"></i></a>
                      <a href="#" class="tw"><i class="ti-twitter-alt"></i></a>
                      <a href="#" class="li"><i class="ti-linkedin"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        
        <!--================End Single Product Area =================-->
      </div>
  <?php }else{
    echo "Tidak ada data";
  }?>
    <!-- </main> -->
    <!--Main layout-->

    <!--Footer-->
    <footer class="page-footer text-center font-small mt-4 wow fadeIn">

      <!--Call to action-->
      <!-- <div class="pt-4">
      <a class="btn btn-outline-white" href="https://mdbootstrap.com/docs/jquery/getting-started/download/" target="_blank"
        role="button">Download MDB
        <i class="fas fa-download ml-2"></i>
      </button>
      <a class="btn btn-outline-white" href="https://mdbootstrap.com/education/bootstrap/" target="_blank" role="button">Start
        free tutorial
        <i class="fas fa-graduation-cap ml-2"></i>
      </a>
    </div> -->
      <!--/.Call to action-->

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
        <a href="https://mdbootstrap.com/education/bootstrap/" target="_blank"> MaiShop.com </a>
      </div>
      <!--/.Copyright-->

    </footer>
    <!--/.Footer-->

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="../assets/mdb/js/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../assets/mdb/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../assets/mdb/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../assets/mdb/js/mdb.min.js"></script>
    <!-- easing js -->
    <script src="../assets/winter/js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="../assets/winter/js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="../assets/winter/js/lightslider.min.js"></script>
    <!-- swiper js -->
    <script src="../assets/winter/js/mixitup.min.js"></script>
    <!-- particles js -->
    <script src="../assets/winter/js/owl.carousel.min.js"></script>
    <script src="../assets/winter/js/jquery.nice-select.min.js"></script>
    <!-- slick js -->
    <script src="../assets/winter/js/slick.min.js"></script>
    <script src="../assets/winter/js/jquery.counterup.min.js"></script>
    <script src="../assets/winter/js/waypoints.min.js"></script>
    <script src="../assets/winter/js/contact.js"></script>
    <script src="../assets/winter/js/jquery.ajaxchimp.min.js"></script>
    <script src="../assets/winter/js/jquery.form.js"></script>
    <script src="../assets/winter/js/jquery.validate.min.js"></script>
    <script src="../assets/winter/js/mail-script.js"></script>
    <!-- custom js -->
    <script src="../assets/winter/js/custom.js"></script>
    <!-- Initializations -->
    <script type="text/javascript">
      // Animations initialization
      new WOW().init();
    </script>
</body>

</html>
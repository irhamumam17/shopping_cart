<?php
session_start();
require_once 'Models/Item.php';
require_once 'Helper/Database.php';

use Models\Item;

$item = new Item();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>MaiShop | Home</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/framework/fontawesome/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="assets/mdb/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="assets/mdb/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="assets/mdb/css/style.min.css" rel="stylesheet">
  <link href="assets/mdb/css/style.css" rel="stylesheet">
  <!-- animate CSS -->
  <link rel="stylesheet" href="assets/winter/css/animate.css">
  <!-- owl carousel CSS -->
  <link rel="stylesheet" href="assets/winter/css/owl.carousel.min.css">
  <!-- font awesome CSS -->
  <link rel="stylesheet" href="assets/winter/css/all.css">
  <!-- flaticon CSS -->
  <link rel="stylesheet" href="assets/winter/css/flaticon.css">
  <link rel="stylesheet" href="assets/winter/css/themify-icons.css">
  <!-- font awesome CSS -->
  <link rel="stylesheet" href="assets/winter/css/magnific-popup.css">
  <!-- swiper CSS -->
  <link rel="stylesheet" href="assets/winter/css/slick.css">
  <!-- <link rel="stylesheet" media="screen" href="assets/particlesjs/css/style.css"> -->
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
    #stats,
.count-particles{
  -webkit-user-select: none;
  margin-top: 5px;
  margin-left: 5px;
}

#stats{
  border-radius: 3px 3px 0 0;
  overflow: hidden;
}

.count-particles{
  border-radius: 0 0 3px 3px;
}


/* ---- particles.js container ---- */

#particles-js{
  width: 100%;
  height: 100% auto;
  margin-top: -1rem;
  background-color: #bbe1fa;
  background-image: url('');
  background-size: cover;
  background-position: 50% 50%;
  background-repeat: no-repeat;
  position: fixed;
  bottom: 0px;
  z-index: -999;
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
          <li class="nav-item active">
            <a class="nav-link waves-effect" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
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
            <a class="nav-link waves-effect" href="Views/detail-cart.php">
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
          <?php
            if (isset($_SESSION['user'])) {
              ?>
              <li class="nav-item">
              <a class="nav-link waves-effect" href="Controllers/users/user_logout">
                <i class="fas fa-sign-out-alt"></i>
                <span class="clearfix d-none d-sm-inline-block"> Logout </span>
              </a>
          </li>
              <?php
            }?>
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
    <div class="carousel-inner" role="listbox">

      <!--First slide-->
      <div class="carousel-item active">
        <div class="view" style="background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/8-col/img%282%29.jpg'); background-repeat: no-repeat; background-size: cover;">

          <!-- Mask & flexbox options-->
          <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">

            <!-- Content -->
            <div class="text-center white-text mx-5 wow fadeIn">
              <h1 class="mb-4">
                <strong>Happiness Not In Money, But In Shopping</strong>
              </h1>

              <p>
                <strong>Best & Free E-Commerce</strong>
              </p>

              <p class="mb-4 d-none d-md-block">
                <strong>The most comprehensive E-Commerce for all people. Loved by over 500 000 users. All things is available here, including your hearth. Create your own store.</strong>
              </p>

              <a class="btn btn-outline-white btn-lg">Start Shopping
                <i class="fas fa-graduation-cap ml-2"></i>
              </a>
            </div>
            <!-- Content -->

          </div>
          <!-- Mask & flexbox options-->

        </div>
      </div>
      <!--/First slide-->

      <!--Second slide-->
      <div class="carousel-item">
        <div class="view" style="background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/8-col/img%283%29.jpg'); background-repeat: no-repeat; background-size: cover;">

          <!-- Mask & flexbox options-->
          <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">

            <!-- Content -->
            <div class="text-center white-text mx-5 wow fadeIn">
              <h1 class="mb-4">
                <strong>Happiness Not In Money, But In Shopping</strong>
              </h1>

              <p>
                <strong>Best & Free E-Commerce</strong>
              </p>

              <p class="mb-4 d-none d-md-block">
                <strong>The most comprehensive E-Commerce for all people. Loved by over 500 000 users. All things is available here, including your hearth. Create your own store.</strong>
              </p>

              <a class="btn btn-outline-white btn-lg">Start Shopping
                <i class="fas fa-graduation-cap ml-2"></i>
              </a>
            </div>
            <!-- Content -->

          </div>
          <!-- Mask & flexbox options-->

        </div>
      </div>
      <!--/Second slide-->

      <!--Third slide-->
      <div class="carousel-item">
        <div class="view" style="background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/8-col/img%285%29.jpg'); background-repeat: no-repeat; background-size: cover;">

          <!-- Mask & flexbox options-->
          <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">

            <!-- Content -->
            <div class="text-center white-text mx-5 wow fadeIn">
              <h1 class="mb-4">
                <strong>Happiness Not In Money, But In Shopping</strong>
              </h1>

              <p>
                <strong>Best & Free E-Commerce</strong>
              </p>

              <p class="mb-4 d-none d-md-block">
                <strong>The most comprehensive E-Commerce for all people. Loved by over 500 000 users. All things is available here, including your hearth. Create your own store.</strong>
              </p>

              <a class="btn btn-outline-white btn-lg">Start Shopping
                <i class="fas fa-graduation-cap ml-2"></i>
              </a>
            </div>
            <!-- Content -->

          </div>
          <!-- Mask & flexbox options-->

        </div>
      </div>
      <!--/Third slide-->

    </div>
    <!--/.Slides-->

    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->

  </div>
  <!--/.Carousel Wrapper-->

  <!--Main layout-->
  <main>
  <div id="particles-js"></div>
    <div class="container">
      <!--Navbar-->
      <nav class="navbar navbar-expand-lg navbar-dark mdb-color lighten-3 mt-3 mb-5">

        <!-- Navbar brand -->
        <span class="navbar-brand">Categories:</span>

        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="basicExampleNav">

          <!-- Links -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">All
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <?php
            $result = $item->indexCategory();
            $result_category = $result["data"];
            // var_dump($result["data"]);

            foreach ($result_category as $data) {
              echo "<li class='nav-item'>
                <a class='nav-link' href='#'>" . $data['nama'] . "</a>
              </li>";
            }
            ?>
          </ul>
          <!-- Links -->

          <form class="form-inline">
            <div class="md-form my-0">
              <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            </div>
          </form>
        </div>
        <!-- Collapsible content -->

      </nav>
      <!--/.Navbar-->
      <!--Section: Products v.3-->
      <section class="text-center mb-4">
        <section class="new_arrival section_padding">
          <!--Grid row-->
          <div class="container-fluid">
            <div class="row">
            <?php
                $i = 0;
                $result = $item->index();
                $result_item = $result["data"];
                foreach ($result_item as $item) {
                ?>
              <div class="col-md-4">
              <form id="formId" action="Controllers/item/addcart" method="post">
                <input type="hidden" name="id_item" value="<?php echo $item['id']; ?>">
                <input name="jumlah" type="hidden" value="1">
                <input type="hidden" name="id_user" value="<?php echo $_SESSION['user']['id']; ?>">
                  <!-- <div class="new_arrival_iner filter-container"> -->
                    <div class="single_arrivel_item weidth_1 mix shoes">
                      <img src="assets/winter/img/arrivel/arrivel_5.png" alt="#">
                      <div class="hover_text">
                        <p><?php echo $item['nama_category']; ?></p>
                        <a href="single-product.html">
                          <h3><?php echo $item['nama']; ?></h3>
                        </a>
                        <div class="rate_icon">
                          <a > <i class="fas fa-star"></i> </a>
                          <a > <i class="fas fa-star"></i> </a>
                          <a > <i class="fas fa-star"></i> </a>
                          <a > <i class="fas fa-star"></i> </a>
                          <a > <i class="fas fa-star"></i> </a>
                        </div>
                        <h5>IDR <?php echo $item['harga']; ?></h5>
                        <div class="social_icon">
                          <a href="Views/detail-product?id=<?php echo $item['id']; ?>" title="Lihat Barang"><i class="ti-heart"></i></a>
                          <a onclick="submitForm()" name="addcart" title="Tambah Ke Keranjang">
                            <i class="ti-bag"></i>
                            <input name="addcart" type="hidden">
                          </a>
                        </div>
                      </div>
                    </div>
                  <!-- </div> -->
              </div>
                </form>
              <?php
                  $i++;
                  if ($i % 3 == 0) {
                    echo "</div><div class='row'>";
                  }
                }
                  ?>
            </div>
          </div>
          <!--Grid row-->
        </section>
      </section>
      <!--Section: Products v.3-->

      <!--Pagination-->
      <!--Pagination-->
    </div>
  </main>
  <!--Main layout-->

  <!--Footer-->
  <footer class="page-footer text-center font-small mt-4" style="z-index: 2;">

    <!--Call to action-->
    <!-- <div class="pt-4">
      <a class="btn btn-outline-white" href="https://mdbootstrap.com/docs/jquery/getting-started/download/" target="_blank"
        role="button">Download MDB
        <i class="fas fa-download ml-2"></i>
      </a>
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
  <!-- scripts -->
<script src="assets/particlesjs/particles.js"></script>
<script src="assets/particlesjs/js/app.js"></script>

<!-- stats.js -->
<script src="assets/particlesjs/js/lib/stats.js"></script>

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="assets/mdb/js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="assets/mdb/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="assets/mdb/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="assets/mdb/js/mdb.min.js"></script>
  <!-- easing js -->
  <script src="assets/winter/js/jquery.magnific-popup.js"></script>
  <!-- swiper js -->
  <script src="assets/winter/js/swiper.min.js"></script>
  <!-- swiper js -->
  <script src="assets/winter/js/mixitup.min.js"></script>
  <!-- particles js -->
  <script src="assets/winter/js/owl.carousel.min.js"></script>
  <script src="assets/winter/js/jquery.nice-select.min.js"></script>
  <!-- slick js -->
  <script src="assets/winter/js/slick.min.js"></script>
  <script src="assets/winter/js/jquery.counterup.min.js"></script>
  <script src="assets/winter/js/waypoints.min.js"></script>
  <script src="assets/winter/js/contact.js"></script>
  <script src="assets/winter/js/jquery.ajaxchimp.min.js"></script>
  <script src="assets/winter/js/jquery.form.js"></script>
  <script src="assets/winter/js/jquery.validate.min.js"></script>
  <script src="assets/winter/js/mail-script.js"></script>
  <!-- custom js -->
  <script src="assets/winter/js/custom.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();
  </script>
  <script language="javascript" type="text/javascript">
    function submitForm() {
       $("#formId").submit();
    }
</script>
</body>

</html>
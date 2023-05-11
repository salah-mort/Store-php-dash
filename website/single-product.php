<?php
include_once "../Dashboard/Data_con.php";
$id = $_GET['id'];
$query1 = "SELECT * from store where id= $id";
$result1 = mysqli_query($connection, $query1);


?>

<!DOCTYPE html>
<html lang="en">

<?php include "partials/_header.php"; ?>

<body>

  <!-- Pre Header -->
  <div id="pre-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <span>Suspendisse laoreet magna vel diam lobortis imperdiet</span>
        </div>
      </div>
    </div>
  </div>

  <?php include "partials/_navbar.php"; ?>
  <div class="container">
    <a class="navbar-brand" href="#"><img src="assets/images/header-logo.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.html">Home</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="products.html">Products
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.html">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.html">Contact Us</a>
        </li>
      </ul>
    </div>
  </div>
  </nav>

  <!-- Page Content -->
  <!-- Single Starts Here -->
  <div class="single-product">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <div class="line-dec"></div>
            <h1><?php
                $row = mysqli_fetch_assoc($result1);
                echo $row['name']; ?></h1>
          </div>
        </div>
        <div class="col-md-6">
          <div class="product-slider">
            <div id="slider" class="flexslider">
              <ul class="slides">
                <li>
                  <img src=<?php echo "http://localhost/Project-Final/Dashboard/uploads/images/" . $row['image']; ?> />
                </li>


                <!-- items mirrored twice, total of 12 -->
              </ul>
            </div>

          </div>
        </div>
        <div class="col-md-6">
          <div class="right-content">
            <h4><?php echo $row['name']; ?></h4>

            <p><?php
            include_once "../Dashboard/Data_con.php";
            echo $row['description']; ?> </p>
            <span>7 left on stock</span>
            <?php ob_start();
            system('getmac');
            $Content = ob_get_contents();
            ob_clean();
            $mac = substr($Content, strpos($Content, '\\') - 20, 17);
            $query1 = "SELECT * from  rates where user='$mac' and store_id ='$id' ";
            $result1 = mysqli_query($connection, $query1);
            if (mysqli_num_rows($result1)>0) {
              $row1 = mysqli_fetch_assoc($result1);
              echo "<p>" . $row1['rate'] . "</p>";
            } else {
              echo ' <form action="rate.php?id=' . $row['id'] . '" method="POST">
<label for="quantity">Rate:</label>
<input name="rate" type="number" class="quantity-text" id="quantity " min="1" max="5"
    value="1">
<input type="submit" class="button" value="Rate Now!">
</form>';
            }
            ?>
            <div class="down-content">
              <div class="categories">
                <h6>Category: <span><a href="#">Pants</a>,<a href="#">Women</a>,<a href="#">Lifestyle</a></span></h6>
              </div>
              <div class="share">
                <h6>Share: <span><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-linkedin"></i></a><a href="#"><i class="fa fa-twitter"></i></a></span></h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Single Page Ends Here -->





  <!-- Subscribe Form Starts Here -->
  <div class="subscribe-form">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <div class="line-dec"></div>
            <h1>Subscribe on PIXIE now!</h1>
          </div>
        </div>
        <div class="col-md-8 offset-md-2">
          <div class="main-content">
            <p>Godard four dollar toast prism, authentic heirloom raw denim messenger bag gochujang put a bird on it celiac readymade vice.</p>
            <div class="container">
              <form id="subscribe" action="" method="get">
                <div class="row">
                  <div class="col-md-7">
                    <fieldset>
                      <input name="email" type="text" class="form-control" id="email" onfocus="if(this.value == 'Your Email...') { this.value = ''; }" onBlur="if(this.value == '') { this.value = 'Your Email...';}" value="Your Email..." required="">
                    </fieldset>
                  </div>
                  <div class="col-md-5">
                    <fieldset>
                      <button type="submit" id="form-submit" class="button">Subscribe Now!</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Subscribe Form Ends Here -->



  <?php include "partials/_footer.php"; ?>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <!-- Additional Scripts -->
  <script src="assets/js/custom.js"></script>
  <script src="assets/js/owl.js"></script>
  <script src="assets/js/isotope.js"></script>
  <script src="assets/js/flex-slider.js"></script>


  <script language="text/Javascript">
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t) { //declaring the array outside of the
      if (!cleared[t.id]) { // function makes it static and global
        cleared[t.id] = 1; // you could use true and false, but that's more typing
        t.value = ''; // with more chance of typos
        t.style.color = '#fff';
      }
    }
  </script>


</body>

</html>
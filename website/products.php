<?php
include_once "../Dashboard/Data_con.php";
$category_id = $_GET['id'];
$query1 = "SELECT * from store where category_id= $category_id";
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
  <!-- Page Content -->
  <!-- Items Starts Here -->
  <div class="featured-page">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-12">
          <div class="section-heading">
            <div class="line-dec"></div>
            <h1>Featured Items</h1>
          </div>
        </div>
        <div class="col-md-8 col-sm-12">
          <div id="filters" class="button-group">
            <button class="btn btn-primary" data-filter="*">All Products</button>
            <button class="btn btn-primary" data-filter=".new">Newest</button>
            <button class="btn btn-primary" data-filter=".low">Low Price</button>
            <button class="btn btn-primary" data-filter=".high">Hight Price</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="featured container no-gutter">
    <?php
    while ($row = mysqli_fetch_assoc($result1)) {

     
      echo '<div id="2" class="item high col-md-4">
          <a href="single-product.php?id='.$row['id'].'">
            <div class="featured-item">
              <img src="http://localhost/Project-Final/Dashboard/uploads/images/' . $row['image'] . '" alt="">
              <h4>'.$row['name'].'</h4>
              <h6>$25.00</h6>
            </div>
          </a>
        </div>';
    }

    ?>



  </div>
  </div>

  <div class="page-navigation">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul>
            <li class="current-page"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Featred Page Ends Here -->


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



  <!-- Footer Starts Here -->
  <?php include "partials/_footer.php"; ?>
  <!-- Sub Footer Ends Here -->


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <!-- Additional Scripts -->
  <script src="assets/js/custom.js"></script>
  <script src="assets/js/owl.js"></script>
  <script src="assets/js/isotope.js"></script>


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
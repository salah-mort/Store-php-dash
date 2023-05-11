<?php
include "Data_con.php";
$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $name = $_POST['a_name'];
  $email = $_POST['a_email'];
  $address = $_POST['a_address'];
  $comend = $_POST['a_comend'];
  $mobile = $_POST['a_mobile'];
  $password = md5($_POST['a_password']);
  //    if(isset($_POST['status'])){
  //        $status==$_POST['status'];
  //    }else
  //    $status = 0;
  isset($_POST['active']) ? $active = $_POST['active'] : $active = 0;

  $date = Date("y-m-d h:i:s");

  //لفحص هل المستخدم قام بتدخيل بيانات في الفورم ام لا                 
  if (empty($name)) {
    $errors['name_error'] = "please try Writh Name is required ";
  }
  if (empty($email)) {
    $errors['email_error'] = "please try Writh Email is required ";
  }
  if (empty($address)) {
    $errors['address_error'] = "please try Writh Address is required ";
  }

  if (empty($comend)) {
    $errors['comend_error'] = "please try Writh Comend is required ";
  }
  if (empty($mobile)) {
    $errors['mobile_error'] = "please try Writh Mobile is required ";
  }
  if (empty($password)) {
    $errors['password_error'] = "please try Writh Password is required ";
  }

  $query = "select * from admin where email='$email'";
  $result = mysqli_query($connection, $query);
  if (mysqli_num_rows($result)>0) {
    $errors['email_error'] = "This email already exists";
  }

  //حتى تمنع اضافة قيم فارغة الى الداتا بيز
  if (count($errors) > 0) {
    $errors['general_error'] = "Please try agin ";
  } else {
    $query = "INSERT INTO admin(name_X, phone, email, password_x, comend, Address_x, Active, Date_opra) VALUES ('$name', '$mobile', '$email', '$password','$comend','$address','$active','$date')";
    $result = mysqli_query($connection, $query);
    if ($result) {
      $errors = [];
      ///////////
      $success = true;
      header('Location:login.php');
    } else {
      $errors['general_error'] = mysqli_error($connection);
    }
  }
}


?>




<!DOCTYPE html>
<html lang="en">
<?php include "partials/_header.php"; ?>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    <?php include "partials/_sidebar.php"; ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_navbar.html -->
      <?php include "partials/_navbar.php"; ?>
      <!-- partial -->
      <div class="main-panel  ">
        <div class="content-wrapper">
          <div style=" border: 1px solid white; border-radius:15px" class="card">
            <div class="card-body">
              <h4 class="card-title admin">Admins Form</h4>
              <div class="hr"></div>
              <p class="card-description text-center" style="font-size:30px;"> Add new Admins </p>
              <?php
              if (!empty($errors['general_error'])) {
                echo "<div class='alert alert-danger'>" . $errors['general_error'] . "</div>";
              } elseif ($success) {
                echo "<div class='alert alert-success'>Category Added Successfully</div>";
              }
              ?>
              <div class="form">
                <form class="forms-sample " method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                  <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-2 col-form-label text-center">Name</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="exampleInputUsername2" placeholder="Username" name="a_name">
                      <?php
                      if (!empty($errors['name_error'])) {
                        echo "<span class='text-danger'>" . $errors['name_error'] . "</span>";
                      }
                      ?>
                    </div>
                  </div>
                  <div class="form-group row ">
                    <label for="exampleInputEmail2" class="col-sm-2 col-form-label text-center">Email</label>
                    <div class="col-sm-6">
                      <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email" name="a_email">
                      <?php
                      if (!empty($errors['email_error'])) {
                        echo "<span class='text-danger'>" . $errors['email_error'] . "</span>";
                      }
                      ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputMobile" class="col-sm-2 col-form-label text-center">Mobile</label>
                    <div class="col-sm-6">
                      <input type="number" class="form-control" id="exampleInputMobile" placeholder="Mobile number" name="a_mobile">
                      <?php
                      if (!empty($errors['mobile_error'])) {
                        echo "<span class='text-danger'>" . $errors['mobile_error'] . "</span>";
                      }
                      ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputPassword2" class="col-sm-2 col-form-label text-center">Password</label>
                    <div class="col-sm-6">
                      <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" name="a_password">
                      <?php
                      if (!empty($errors['password_error'])) {
                        echo "<span class='text-danger'>" . $errors['password_error'] . "</span>";
                      }
                      ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-2 col-form-label text-center">Address</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="exampleInputUsername2" class="text-center" placeholder="Address" name="a_address">
                      <?php
                      if (!empty($errors['address_error'])) {
                        echo "<span class='text-danger'>" . $errors['address_error'] . "</span>";
                      }
                      ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-2 col-form-label text-center">description</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="exampleInputUsername2" placeholder="description" name="a_comend">
                      <?php
                      if (!empty($errors['comend_error'])) {
                        echo "<span class='text-danger'>" . $errors['comend_error'] . "</span>";
                      }
                      ?>
                    </div>
                  </div>
                  <div class="form-check form-check-flat form-check-primary m-5">
                    <label class="form-check-label " style="color: #28D094; font-size: 18px;">
                      <input type="checkbox" class="form-check-input text-center" name="active" value="1"> Active <i class="input-helper"></i></label>
                  </div>
                  <div class="button-div">
                    <button type="submit" class="button">Submit</button>
                    <button type="reset" class="button">Cancel</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include "partials/_footer.php"; ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="assets/vendors/chart.js/Chart.min.js"></script>
  <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
  <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
  <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="assets/js/dashboard.js"></script>
  <!-- End custom js for this page -->
</body>

</html>
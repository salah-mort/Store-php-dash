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
  $password = $_POST['a_password'];
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

            <div class="card-header">
              <h2 class="card-title admin" id="basic-layout-card-center">admin Info</h2>
              <div class="hr"></div>
              <div class="form">
              </div>
              <div class="row">
                <div class="col-12">


                <div>
                  <div class="card-content collapse show">
                    <div class="card-body card-dashboard">
                      <table style="width: 100%" class="table display nowrap table-striped table-bordered scroll-horizontal ">
                        <thead>
                          <tr>

                            <th class="text-center " scope="col" style="color: #434a54;background: #ffab10;">id</th>
                            <th class="text-center " scope="col" style="color: #434a54;background: #ffab10;">Name</th>
                            <th class="text-center" scope="col" style="color: #434a54;background: #ffab10;">Email</th>
                            <th class="text-center" scope="col" style="color: #434a54;background: #ffab10;">Phone</th>
                            <th class="text-center" scope="col" style="color: #434a54;background: #ffab10;">Address</th>
                            <th class="text-center" scope="col" style="color: #434a54;background: #ffab10;">Description</th>
                            <th class="text-center" scope="col" style="color: #434a54;background: #ffab10;">Statise
                          </th>
                            <th class="text-center" scope="col" style="color: #0069ff;background: #ffffff; ">Edit</th>
                            <th class="text-center" scope="col" style="color: #0069ff;background: #ffffff; ">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          include "Data_con.php";
                          $limit = 10;
                          $page = $_GET['page'] ?? 1;
                          $ofset = ($page - 1) * $limit;
                          $query = "SELECT * FROM admin ORDER BY admin.id DESC limit $limit offset $ofset";
                          $result = mysqli_query($connection, $query);
                          if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                              if ($row['Active'] == 1) {
                                $temp = "<span class='badge badge-success'>Active</span>";
                              } else {
                                $temp = "<span class='badge badge-danger'>NonActive</span>";
                              }
                              echo "<tr>" .
                              
                                "<td>" . $row['id'] . "</td>" .
                                "<td>" . $row['name_X'] . "</td>" .
                                "<td>" . $row['email'] . "</td>" .
                                "<td>" . $row['phone'] . "</td>" .
                                "<td>" . $row['Address_x'] . "</td>" .
                                "<td>" . $row['comend'] . "</td>" .
                                "<td>" . $temp . "</td>" .

                                
                                "<td> <a href='_editadmin.php?id=" . $row['id'] . "' class='btn btn-info  box-shadow-3 mr-1 mb-1'>Edit Admin</a>
                                                        </td>" .

                                "<td>" .
                                " <form action='_deleteadmin.php' method='post'>
                                                     <input  type='hidden' name='id' value=' " . $row['id']  . " ' >
                                                          <button type='submit' class='btn  btn-danger ' id='delete-btn'>
                                                          Delete Admin
                                                          </button>
                                                      </form>"
                                . "</td>" .

                                "</tr>";
                            }
                          }



                          ?>

                        </tbody>
                      </table>
                      <br><br>
                      <div class="justify-content-center d-flex">
                        <?php
                        $query = "select count(id) as rowNumber from admin";
                        $result = mysqli_query($connection, $query);
                        $count = mysqli_fetch_assoc($result);
                        $count_page = ceil($count['rowNumber'] / $limit);
                        echo " <ul class='pagination'>";
                        for ($i = 1; $i <= $count_page; $i++) {
                          echo "<il class ='page-item'><a href='_showAdmins.php?page=$i' class = 'page-link'>$i</a></il>";
                        }
                        echo '</ul>';
                        ?>
                      </div>
                    </div>

                  </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
              </div>
            </div>
          </div>
                <?php include "partials/_footer.php"; ?>
          </div>
                <!-- partial -->
              <!-- main-panel ends -->
            <!-- page-body-wrapper ends -->
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
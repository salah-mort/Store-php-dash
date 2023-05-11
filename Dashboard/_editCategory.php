<?php
include "Data_con.php";
$errors = [];
$success = false;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include "Data_con.php";
    $query = "SELECT * FROM category where id=$id";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['c_name'];
    $description = $_POST['c_description'];
    $date = Date("y-m-d h:i:s");

    //لفحص هل المستخدم قام بتدخيل بيانات في الفورم ام لا
    if (empty($name)) {
        $errors['name_error'] = "please try Writh Name is required if you want edit ";
    }
    if (empty($description)) {
        $errors['description_error'] = "please try Writh description is required if you want edit";
    }

    //حتى تمنع اضافة قيم فارغة الى الداتا بيز
    if (count($errors) > 0) {
        $errors['general_error'] = "Please try agin ";
    } else {
        $query = "UPDATE category SET name='$name',description='$description' where id='" . $_GET['id'] . "'";
        $result = mysqli_query($connection, $query);
        if ($result) {
            $errors = [];
        } else {
            $errors['general_error'] = mysqli_error($connection);
        }
        header('Location:_showCategory.php');
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
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title admin text-success" id="basic-layout-card-center"> edit Category</h2>
                                <div class="hr"></div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="form">
                                    <div class="card-body">
                                        <?php
                                        if (!empty($errors['general_error'])) {
                                            echo "<div class='alert alert-danger'>" . $errors['general_error'] . "</div>";
                                        } elseif ($success) {
                                            echo "<div class='alert alert-success'>category Added successed</div>";
                                        }
                                        ?>
                                        <form class="form" method="POST" action="<?php $_SERVER['PHP_SELF']."?id=$id" ?>">

                                            <div class="form-body">
                                                <div class="form-group col-md-4">
                                                    <label for="eventRegInput1" class="text-info">Category Name</label>
                                                    <input type="text" id="eventRegInput1" class="form-control" placeholder="Category Name"  value="<?php echo $row['name'] ?>"  name="c_name">
                                                    <?php
                                                    if (!empty($errors['name_error'])) {
                                                        echo "<span class='text-danger'>" . $errors['name_error'] . "</span>";
                                                    }
                                                    ?>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="eventRegInput2" class="text-info">Category description</label>
                                                    <input type="text" id="eventRegInput2" class="form-control" placeholder="Category Description" value="<?php echo $row['description'] ?>" name="c_description">


                                                    <?php
                                                    if (!empty($errors['description_error'])) {
                                                        echo "<span class='text-danger'>" . $errors['description_error'] . "</span>";
                                                    }
                                                    ?>
                                                </div>

                                            </div>
                                            <div class="form-actions center">
                                                <button type="reset" class="btn btn-light m-3">
                                                    <i class="ft-x"></i> Cancel
                                                </button>
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="la la-check-square-o"></i> Save
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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
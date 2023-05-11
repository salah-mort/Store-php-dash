<?php
include_once "Data_con.php";
$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['s_name'];
    $address = $_POST['a_address'];
    $Description = $_POST['s_des'];
    $phone = $_POST['phone'];
    $Category = $_POST['category_id'];

    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_type = $_FILES['image']['type'];
    $file_tmp_name = $_FILES['image']['tmp_name'];


    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $file_new_name = time() . rand(1, 100000) . ".$file_ext";


    $upload_path = 'uploads/images/' . $file_new_name;
    move_uploaded_file($file_tmp_name, $upload_path);




    //لفحص هل المستخدم قام بتدخيل بيانات في الفورم ام لا
    if (empty($name)) {
        $errors['name_error'] = "please try Writh Name is required ";
    }
    if (empty($address)) {
        $errors['address_error'] = "please try Writh Address is required ";
    }

    if (empty($Description)) {
        $errors['comend_error'] = "please try Writh Description is required ";
    }
    if (empty($phone)) {
        $errors['mobile_error'] = "please try Writh Phone is required ";
    }



    //حتى تمنع اضافة قيم فارغة الى الداتا بيز
    if (count($errors) > 0) {
        $errors['general_error'] = "Please try agin ";
    } else {
        $query = "INSERT INTO store(name, phone, address, description, category_id, image) VALUES ('$name', '$phone', '$address', '$Description','$Category','$file_new_name')";
        $result = mysqli_query($connection, $query);
        if ($result) {
            $errors = [];
            ///////////
            $success = true;
            header('Location:_showStore.php');
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
                            <h4 class="card-title admin">Stores Form</h4>
                            <div class="hr"></div>
                            <?php
                            if (!empty($errors['general_error'])) {
                                echo "<div class='alert alert-danger'>" . $errors['general_error'] . "</div>";
                            } elseif ($success) {
                                echo "<div class='alert alert-success'>Category Added Successfully</div>";
                            }
                            ?>
                            <div class="form1">
                                <form class="forms-sample " method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <h3 class="form-section"><i class="la la-home"></i> Store </h3>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1">Name</label>
                                                    <input type="text" id="projectinput1" class="form-control" placeholder="Enter Name" name="s_name">
                                                    <?php
                                                    if (!empty($errors['name_error'])) {
                                                        echo "<span class='text-danger'>" . $errors['name_error'] . "</span>";
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput2">Description</label>
                                                    <input type="text" id="projectinput2" class="form-control" placeholder="Enter Description" name="s_des">
                                                    <?php
                                                    if (!empty($errors['comend_error'])) {
                                                        echo "<span class='text-danger'>" . $errors['comend_error'] . "</span>";
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput3">Phone</label>
                                                    <input type="number" id="projectinput3" class="form-control" placeholder="Enter Phone" name="phone">
                                                    <?php
                                                    if (!empty($errors['mobile_error'])) {
                                                        echo "<span class='text-danger'>" . $errors['mobile_error'] . "</span>";
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputUsername2" class="col-sm-2 col-form-label text-center">Address</label>

                                                    <input type="text" class="form-control" id="exampleInputUsername2" class="text-center" placeholder="Address" name="a_address">
                                                    <?php
                                                    if (!empty($errors['address_error'])) {
                                                        echo "<span class='text-danger'>" . $errors['address_error'] . "</span>";
                                                    }
                                                    ?>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput6">Category</label>
                                                    <select class="form-control" id="projectinput6" name='category_id'>
                                                        <?php
                                                        include "connection.php";
                                                        $query = "select * from category";
                                                        $result = mysqli_query($connection, $query);

                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            echo "<option value=" . $row['id'] . " >" . $row['name'] . "</option>";
                                                        }


                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput7">Image</label>
                                                    <input type="file" multiple id="projectinput7" class="form-control" name="image">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-actions">
                                            <button type="reset" class="btn btn-warning mr-1">
                                                <i class="ft-x"></i> Cancel
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> Save
                                            </button>
                                        </div>
                                </form>
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
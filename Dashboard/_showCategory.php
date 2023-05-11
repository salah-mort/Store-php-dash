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
                                <h2 class="card-title admin" id="basic-layout-card-center">Category Info</h2>
                                <div class="hr"></div>
                                <div class="form">
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">All Categories </h4>

                                            </div>

                                            <div class="card-content collapse show">
                                                <div class="card-body card-dashboard">
                                                    <table style="width: 100%" class="table display nowrap table-striped table-bordered scroll-horizontal ">
                                                        <thead>
                                                            <tr class="yu">
                                                                <th style="color:#ffab00;background:#3c6868;">Category Name</th>
                                                                <th style="color:#ffab00;background:#3c6868;"> Category Details</th>
                                                                <th style="color:#ffab00;background:#3c6868;">Date</th>
                                                                <th style="color:#ffab00;background:#3c6868;">Edit</th>
                                                                <th style="color:#ffab00;background:#3c6868;">DELETE</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            include "Data_con.php";
                                                            $limit = 5;
                                                            $page = $_GET['page'] ?? 1;
                                                            $ofset = ($page - 1) * $limit;
                                                            $query = "SELECT * FROM category ORDER BY category.id DESC limit $limit offset $ofset";
                                                            $result = mysqli_query($connection, $query);
                                                            if (mysqli_num_rows($result) > 0) {
                                                                while ($row = mysqli_fetch_assoc($result)) {

                                                                    echo "<tr>" .
                                                                        "<td>" . $row['name'] . "</td>" .
                                                                        "<td>" . $row['description'] . "</td>" .
                                                                        "<td>" . $row['careated_at'] . "</td>" .
                                                                        "<td> <a href='_editCategory.php?id=" . $row['id'] . "' class='btn btn-primary  btn-outline-danger box-shadow-3 mr-1 mb-1'><i
                                                                        class='mdi mdi-table-edit'></i>
                                                                        Edit
                                                                        </a>
                                                        </td>" .
                                                                        "<td>" .
                                                                        " <form action='_deleteCategory.php' method='post'>
                                                     <input  type='hidden' name='id' value=' " . $row['id']  . " ' >
                                                          <button type='submit' class='btn mdi mdi-delete-forever btn-success btn-outline-danger' id='delete-btn'>
                                                          Delete
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
                                                        $query = "select count(id) as rowNumber from Category";
                                                        $result = mysqli_query($connection, $query);
                                                        $count = mysqli_fetch_assoc($result);
                                                        $count_page = ceil($count['rowNumber'] / $limit);
                                                        echo " <ul class='pagination'>";
                                                        for ($i = 1; $i <= $count_page; $i++) {
                                                            echo "<il class ='page-item'><a href='_showCategory.php?page=$i' class = 'page-link'>$i</a></il>";
                                                        }
                                                        echo '</ul>';
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </section>
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
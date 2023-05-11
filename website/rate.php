<?php



include_once '../Dashboard/Data_con.php';
ob_start();
  system('getmac');
  $Content = ob_get_contents();
  ob_clean();
  $mac= substr($Content, strpos($Content,'\\')-20, 17);



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $rate = $_POST['rate'];
  $id1 = $_GET['id'];

  $query = "INSERT INTO rates(store_id,rate,user)
  VALUES('$id1','$rate','$mac')";
  $result = mysqli_query($connection, $query);
  if ($result) {
      $header = 'location:single-product.php?id=' . $_GET['id'];

      header($header);
      exit();
  }
}




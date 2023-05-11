<?php
include_once "Data_con.php";
$id = $_POST['id'];
$query = "DELETE from admin where id= $id";
$result = mysqli_query($connection, $query);
if ($result) {
    header('location:_showAdmins.php');
}else{
	echo "Donot Delete";
}
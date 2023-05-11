<?php
include_once "Data_con.php";

$id = $_POST['id'];
$query="DELETE from category where id= $id";
$result=mysqli_query($connection,$query);
if($result){
    header('location:_showCategory.php');
}else{
	echo "Donot Delete";
}
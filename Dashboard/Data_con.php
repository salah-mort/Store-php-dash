<?php
$connection=mysqli_connect(
    'localhost',
    'root',
    '',
    'project-final');
if(!$connection){
    die('Error' .
        mysqli_connect_error());
}
?>
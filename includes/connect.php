<?php

$con = mysqli_connect("localhost", "root",  "", "cashback");
if(!$con) {
    die(mysqli_error($con)); 
  
}
// else{
//     echo "okk";
// }
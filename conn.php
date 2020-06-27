<?php

$host="localhost";
$user="root";
$pw="";
$ndb="perfectcup";
$con=mysqli_connect($host,$user,$pw,$ndb,3306);
 if($con){
  echo"connected";
 }else{
  echo"no connected";}
?>
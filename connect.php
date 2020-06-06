<?php

$host="localhost";
$user="root";
$pw="";
$ndb="perfect-cup";
$con=mysqli_connect($host,$user,$pw,$ndb,3306);
 if($con){
  echo"connected";
 }else{
  echo"no connected";}


if(isset($_POST["click"])){
	//$con = connect_to_mysqli($host, $user, $pw, $ndb);
	$name = $_POST["name"];
	$email_adresse = $_POST["email_adresse"];
	$password = $_POST["password"];
	$confirm_password = $_POST["confirm_password"];	 
	$sql = "INSERT INTO contact (name, email_adresse, password, confirm_password) VALUES ('$name', '$email_adresse', '$password', '$confirm_password')";
	if (mysqli_query($con, $sql)) {
		  //echo "<h2><font color=blue>New record added to database.</font></h2>";
	} else {
		  echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}
	mysqli_close($con);

	header('location:index.php');
}
?>
<?php

$host="localhost";
$user="root";
$pw="";
$ndb="perfect-cup";
$con=mysqli_connect($host,$user,$pw,$ndb,3306);
 if($con){
  //echo"connected";
 }else{
  echo"no connected";}


if(isset($_POST["click"])){
	$name = $_POST["name"];
	$email_adresse = $_POST["email_adresse"];
	$password = $_POST["password"];
	$confirm_password = $_POST["confirm_password"];
 
	    $passhash = password_hash($password, PASSWORD_DEFAULT);

	//On vérifie que password et password2 sont identiques

	 if(password_verify($password, $passhash )){
		 
		 //echo $passhash, "   Mot de passe hashi";

		 if($password != $confirm_password ){
			   echo "<h2><font color=white> Les mots de passe que vous avez entrés ne sont pas identiques.</font></h2>";
			 mysqli_close($con);
		   }
	  
		   else { echo "<h2><font color=white> mot de passe identique</font></h2>";
			
			$sql = "INSERT INTO contact (name, email_adresse, password, confirm_password) VALUES ('$name', '$email_adresse', '$passhash', '$passhash')";
			if (mysqli_query($con, $sql)) {
				echo "<h2><font color=white>New record added to database.</font></h2>";
		  } else {
				echo "Error: " . $sql . "<br>" . mysqli_error($con);
		  }
		  mysqli_close($con);
	  
		  //header('location:blog.php');
		   }

		   
	}

	 


	
}
?>
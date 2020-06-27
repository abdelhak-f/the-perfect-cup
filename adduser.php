<?php
session_start();

//New MySQL connection
$mysqli=new mysqli('localhost','root','','perfectcup');

//Check for errors
if ($mysqli->connect_error){
    die('Error :(' . $mysqli->connect_errno . ' )' . $mysqli->connect_error);
}

$fname=mysqli_real_escape_string($mysqli, $_REQUEST['fname']);
$lname=mysqli_real_escape_string($mysqli, $_REQUEST['lname']);
$email=mysqli_real_escape_string($mysqli, $_REQUEST['email']);
$password=mysqli_real_escape_string($mysqli, $_REQUEST['password']);

//Validation

if (strlen ($fname)<2){
    echo "fname";
}
    else if (strlen ($lname)<2){echo "lname";
            }
    else if (strlen ($email)<2){
    echo "eshort";
            }
    else if (filter_var ($email, FILTER_VALIDATE_EMAIL)===false){
    echo "eformat";
            }
    else if (strlen ($password)<2){
    echo "pshort";
            }

    //Password encrypt
    else {
        $spassword = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
//        echo "hashed";


        $query = "SELECT * FROM members WHERE email='$email'";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error());
        $num_rows = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result);

        if ($num_rows < 1) {
            $insert_row = $mysqli->query("INSERT INTO members (fname,lname,email,password) VALUES ('$fname','$lname','$email','$spassword')");


            if ($insert_row) {
                $_SESSION['login'] = $mysqli->insert_id;
                $_SESSION['fname'] = $fname;
                $_SESSION['lname'] = $lname;

                echo "true";
            }
        } else {
            echo "false";
        }
    }



?>
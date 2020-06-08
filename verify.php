<?php 
if (isset($_POST['email_adresse']) && isset($_POST['password'])){
    $username = $_POST['email_adresse'] ;
    $password = $_POST['password'] ;
    $stmt->prepare("SELECT username, email_adresse, password FROM users WHERE username= '$username' AND password = '$password' ");
    $stmt->execute()
    $data = $stmt->fetch();
    $user = $data->$username;
    $email = $data->email ;
    $hashpass = $data->password ;
    if(password_verify($password, $hashpass)){
        $_SESSION['user'] = $user;
        
    }

}




?>
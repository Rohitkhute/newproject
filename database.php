<?php
    session_start();
    $username="";
    $email="";
    $password1="";
    $password2="";
    $errors=array();
    $db = mysqli_connect('localhost','root','','car_rental') or die('could not connect to database');
    echo "";
    if (isset($_POST['reg_user'])) {
        $username = mysqli_real_escape_string($db,$_POST['username']);
        $email =   mysqli_real_escape_string($db,$_POST['email']);
        $password1 =  mysqli_real_escape_string($db,$_POST['password1']);
        $password2 =  mysqli_real_escape_string($db,$_POST['password2']);
    } 
    if(empty($username)){array_push($errors,"Username is required");}
    if(empty($email)){array_push($errors,"Email is required");}
    if(empty($password1)){array_push($errors,"Password is required");}
    if($password1 != $password2){array_push($errors,"Password do not match");}
    $user_check_query = "SELECT * FROM login WHERE username= '$username' or email='$email'LIMIT 1";
    $results = mysqli_query($db,$user_check_query);
    $user = mysqli_fetch_assoc($results);
    if($user){
        if($user['username']==$username){array_push($errors,"");}
        if($user['email']==$email){array_push($errors,"");}
    }
    if(count($errors)==0){
        $password=md5($password1);
        $query="INSERT INTO login (username,email,password) VALUES ('$username','$email','$password')";
        mysqli_query($db,$query);
        $_SESSION['username']=$username; 
        $_SESSION['success']= "Y";
        header("location: login.php");
    }  
//LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db,$_POST['username']);
    $password = mysqli_real_escape_string($db,$_POST['password']);
    if (empty($username)){array_push($errors,"Username is required" );}
    if (empty($password)){array_push($errors,"Password is required" );}
    
        $password=md5($password);
        $query = " SELECT * FROM login WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db,$query);
        if (mysqli_num_rows($results)){
            $_SESSION['username']=$username;
            $_SESSION['success'] = "success";
            header('location:home.php');
        }else{
            array_push($errors,"Wrong username/password");
        }
    
}
?>


<?php

if(isset($_POST['login-submit'])){

    require 'dbh.inc.php';

    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];
    if(empty($mailuid)||empty($password)){
        header("Location:../login.php?error=emptyfeilds");
        exit();
    }
    else {
        $sql ="select * from users where uidUsers=? or emailUsers=?;";
        $stmt =mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location:../login.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt,"ss",$mailuid,$mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                $pwdcheck = password_verify($password,$row['pwdUsers']);
                if($pwdcheck==false){
                    header("Location:../login.php?error=worngpassword");
                    exit();
                }
                else if($pwdcheck==true){
                    session_start();
                    $_SESSION['userId']=$row['idUsers'];
                    $_SESSION['usserUid']=$row['uidUsers'];

                    header("Location:../login.php?login=success");
                    exit();
                }
                else{
                    header("Location:../login.php?error=worngpassword");
                    exit();
                }
            }
            else{
                header("Location:../login.php?error=nouser");
                exit();
            }
        }
    }
}
else{
    header("Location:../login.php");
    exit();
}
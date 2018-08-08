<?php
session_start();
require_once ('ConnectDB.php');
$conn = new ConnectDB;

if(isset($_POST['_submit']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $remember = $_POST['checkbox'];

    $options = [ $email, $password ];
    $user = $conn->loadOneRow("
            SELECT `email`,`password`, 'name' FROM persons
            where `email`=? and password =?",
        $options);

    if(!$user) {
        $_SESSION['error'] = "Login invalid, try again !";
        header('location:login.php');
    } else {
        $_SESSION['user'] = $user; // store info user in session


        // create cookie
        if(isset($remember) && $remember === 'checkbox') {

            setcookie('user',$user, time() + 3600);
            echo "$remember 11111";
            //die;
        }

        header('location:pages.php');
    }
}




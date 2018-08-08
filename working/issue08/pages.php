<?php
session_start();
if(!isset($_SESSION['user']) && !isset($_COOKIE['user'])) {
    $_SESSION['error']= 'Please Login !';
    header('location:login.php');
} elseif (isset($_COOKIE['user'])){
    $_SESSION['user'] = $_COOKIE['user'];
}
// https://www.formget.com/php-select-option-and-php-radio-button/
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@Login Session</title>
    <link rel="stylesheet" href="../../lib/bootstrap/bootstrap.css">
</head>
<body>

<div class="container">
    <div class="">
        <div class="row">
            <div class="col-sm-5 bg-light border border-secondary border-2 mt-2">
                <h1 class="text-primary p-2">Welcome to HOMEPAGE</h1>
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
            <div class="col-sm-7">
                <h3>this is 999</h3>
                <?php
                    echo "<pre>";
                    print_r(session_status());
                    print_r($_SESSION);
                    echo "</pre>";

                ?>
            </div>
        </div>

    </div>
</div>
<script src="../../lib/jquery/jquery-3.3.1.js"></script>
<script src="../../lib/jquery/bootstrap.js"></script>
</body>
</html>
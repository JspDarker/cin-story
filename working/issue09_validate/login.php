<?php
require_once 'Validation.php';
$valid = new Validation;
$err_email=$err_pass='';
$email=$pass='';
$checked = false; // true or false

if(isset($_POST['_submit']) and $_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $checkbox = $_POST['checkbox'];


    $err_email = $valid->checkEmail($email);
    $err_pass = $valid->checkPassword($pass);
    $checked = $valid->rememberMe($checkbox);

    if($err_email === false && $err_pass === false) {
        header('location:welcome.php');
    }
}


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
                <h1 class="text-primary p-2">Register Welcome</h1>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input name="email" value="<?=$email?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        <span class="text-danger"><?=$err_email?></span>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input name="pass" value="<?=$pass?>" type="text" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        <span class="text-danger"><?=$err_pass?></span>
                    </div>

                    <div class="form-group form-check">
                        <input <?php echo ($checked === false) ? '' : 'checked' ?> name="checkbox" type="checkbox" value="remember_me" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Remember me</label>
                    </div>
                    <button type="submit" name="_submit_login" class="btn btn-primary">Login</button>
                    <span class="text-danger">
                    </span>
                </form>
            </div>
            <div class="col-sm-7">

            </div>
        </div>

    </div>
</div>

<script src="../../lib/jquery/jquery-3.3.1.js"></script>
<script src="../../lib/jquery/bootstrap.js"></script>
<script>
    $(function() {
        let check = $('#exampleCheck1');
        console.log(check.val());
        check.on('click',function () {
            console.log($(this).val());
        })
    });
</script>
</body>
</html>
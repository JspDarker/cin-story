<?php
require_once 'Validation.php';
$valid = new Validation;
$err_name=$err_email=$err_pass=$err_pass_confirm='';
$name=$email=$pass=$pass_confirm='';
//require_once '../issue08/ConnectDB.php';
//$conn = new ConnectDB;

if(isset($_POST['_submit']) and $_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $pass_confirm = $_POST['pass_confirm'];

    $err_name = $valid->checkName($name);
    $err_email = $valid->checkEmail($email);
    $err_pass = $valid->checkPassword($pass);
    $err_pass_confirm = $valid->checkPassConfirm($pass, $pass_confirm);

    if($err_email === false && $err_name === false && $err_pass === false && $err_pass_confirm === false) {
        require_once '../issue08/ConnectDB.php';
        $conn = new ConnectDB;
        $sql = "insert into persons (`name`, `email`, `password`)
                values (:name, :email, :password)";

        $pass = password_hash($pass,PASSWORD_DEFAULT);
        $options = [':name'=>$name, ':email'=>$email, ':password'=>$pass];
        $insert = $conn->executeQuery($sql,$options);
        if($insert === false) {
            echo "not insert";
            die;
        } else
            header('location:login.php');
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
                        <label for="name">Name</label>
                        <input name="name" value="<?=$name?>" type="text" class="form-control" id="name" placeholder="Enter name">
                        <span class="text-danger"><?=$err_name?></span>
                    </div>
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

                    <div class="form-group">
                        <label for=Password1">Password Confirmation</label>
                        <input name="pass_confirm" value="<?=$pass_confirm?>" type="text" class="form-control" id=Password1" placeholder="Password confirm">
                        <span class="text-danger"><?=$err_pass_confirm?></span>
                    </div>
                    <button type="submit" name="_submit" class="btn btn-primary">Submit</button>
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
<?php
session_start();
if(isset($_SESSION['user']))
    header('location:pages.php');
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
                <h1 class="text-primary p-2">Login Welcome</h1>
                <form action="redirect.php" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group form-check">
                        <input name="checkbox" type="checkbox" value="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" name="_submit" class="btn btn-primary">Submit</button>
                    <span class="text-danger">
                        <?php
                            if(isset($_SESSION['error'])){
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            }
                        ?>
                    </span>
                </form>
            </div>
            <div class="col-sm-7">
                <?php
                echo "<pre>session";
                print_r($_SESSION);
                echo "</pre>";

                //setcookie('_user_test','100USD',time() + 10);
                echo "<pre> cookie";
                print_r($_COOKIE);
                echo "</pre>";
                ?>
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
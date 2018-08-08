<?php
session_start();
unset($_SESSION['user']);
unset($_SESSION['error']);

header('location:login.php');

/*==============SESSION && COOKIE for LOGIN of USER=======================================
|
| // [login_file] : check session error| if has(session|error)->echo->unset(error)
| // else submit [file redirect]
|       1./ btn->has(submit) -> get value and compare
|       2./ if (valid)
|              check isset_checkbox

                    // remember
|                   if(has_checkbox valid) {
|                        set cookie
                        setcookie('name_cookie','value[recomme_session_val]',time() + 60s);
|                   }
                3./ header->home.php
           } else {-> create session_error and header->login.php}
| */
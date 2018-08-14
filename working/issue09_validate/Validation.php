<?php
/**
 * Created by PhpStorm.
 * User: jsp-thanh
 * Date: 8/11/18
 * Time: 2:51 PM
 */

class Validation
{


    public static function checkName($field)
    {
        if(empty($field)) {
            return 'Name is required !';
        }
        if(!preg_match('/^([a-z ])+$/i',$field)) {
            return 'Name only characters !';
        } else {
            $pattern = '/\s+/';
            $replacement = ' ';
            $string = trim($field);
            if(strlen(preg_replace($pattern,$replacement,$string)) <= 10) {
                return 'name must lager 10 characters';
            }
        }
        return false;
    }

    public function checkEmail($field)
    {
        if(empty($field)) {
            return 'Email is required !';
        }
        if( ! filter_var($field,FILTER_VALIDATE_EMAIL)) {
            return 'Email invalid !';
        }
        return false;
    }

    public function checkPassword($field)
    {
        if(empty($field)) {
            return 'Password is required !';
        }
        if(preg_match('/\s/',$field)) {
            return 'Password no whitespace !';
        } else { // 1 2 3 4 = 123, 124,134, 234
            /*if((! preg_match('/[a-z]/', $field) ||
                ! preg_match('/[A-Z]/', $field) ||
                ! preg_match('/[!@#$%^&*]/', $field)) &&
                ! preg_match('/[0-9]/',$field))
            {
                return 'ERROR a-z !';
            }*/
            $flag1 = $flag2= $flag3=$flag4=0; // get 3 in 4
            if( preg_match('/[0-9]/', $field)) {
                $flag1 = 1;
            }
            if( preg_match('/[a-z]/',$field)) {
                $flag2 = 1;
            }
            if ( preg_match('/[A-Z]/', $field)) {
                $flag3 = 1;
            }
            if ( preg_match('/[!@#$%^&*]/', $field)) {
                $flag4 = 1;
            }
            if(($flag1 + $flag2 + $flag3 + $flag4) < 3) {
                return 'password not strong';
            }
        }
        return false;
    }

    public function checkPassConfirm($pass, $pass_confirm)
    {
        if(empty($pass_confirm)) {
            return 'Field is required !';
        }
        return ($pass != $pass_confirm) ? 'Password confirm not same !' : false;
    }

    // remember me for LOGIN
    public function rememberMe($checkbox)
    {
        if(isset($checkbox) && $checkbox === 'remember_me') {
           //return 'You checked me !';
        } else return false;
    }
}




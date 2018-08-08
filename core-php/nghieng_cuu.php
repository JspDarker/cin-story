<?php
/**
 *
.htaccess
php_flag  display_errors        on
php_value error_reporting       2039
 */
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$serverName = "localhost";
$user_db = 'dev';
$pass_db = 'zxcv';
$db_name = 'fs_shop';

try {
    $conn = new mysqli($serverName,$user_db,$pass_db,$db_name);
    $conn->set_charset('utf8');
} catch (Exception $e) {
    error_log($e->getMessage());
    var_dump(error_log($e->getMessage()));
    exit('Error connection database !');
}

// First, define your auto-load function.
function MyAutoload($className){
    include_once($className . '.php');
}

// Next, register it with PHP.
spl_autoload_register('MyAutoload');

// Try it out!
// Since we haven't included a file defining the MyClass object, our auto-loader will kick in and include MyClass.php.
// For this example, assume the MyClass class is defined in the MyClass.php file.
$var = new MyClass();

<?php
//error_reporting(E_ALL);
$serverName = "localhost";
$user_db = 'dev';
$pass_db = 'zxcv';
$db_name = 'fs_shop';
$conn = new mysqli($serverName,$user_db,$pass_db,$db_name);
$conn->set_charset('utf8');
if($conn->connect_error){exit('Error connection database ! '.$conn->connect_error);};

// prepare statements general for mysqli : ['s:s'=>['data1','data2']]
function prepareStatements($conn, $sql, $options = [])
{
    $stmt = $conn->prepare($sql);
    $one = array_keys($options)[0];
    foreach ($options[array_keys($options)[0]] as $key => $datum) {
        $type = explode(':',array_keys($options)[0]);
        $stmt->bind_param($type[$key],$datum);
    }
    return $stmt;
}

// insert|update|delete
function executeQuery($conn, $sql, $options = [])
{
    $stmt = prepareStatements($conn, $sql, $options);
    return $stmt->execute();
}

// load one row
$sql = 'select * from fs_department where id = ?';
$arr = array('i'=>array(1));
//$ka = loadOneRow($conn,$sql,$arr);
$ka = $conn->query($sql);
$stmt = $ka->bind_param($arr);
$resa = $stmt->execute();
echo "<pre>";
print_r($resa);
echo "</pre>";
die;
function loadOneRow($conn, $sql, $options = [])
{
    $stmt = prepareStatements($conn, $sql, $options);
    $check = $stmt->execute();
    $res = [];
    while ($rows = $check->fetch_assoc()) {
        $res[]=$rows;

    }
    var_dump($rows);
    die;
//    echo 'oke';
//    die;
    //$result = $check->get_result()->fetch_assoc();

    if(! $result) {
        exit('No rows!');
    }
    return $result;
}

// load more rows @return more rows
function loadMoreRows($conn, $sql, $options = [])
{
    $stmt = prepareStatements($conn, $sql, $options);
    $res = $stmt->execute();

    if($res) {
        while ($rows = $res->fetch_assoc()) {

        }

    } else return false;
}

$data = array(
    's:i:s' => array('name','email', 'address')
);
foreach ($data[array_keys($data)[0]] as $key => $datum) {
    //echo $key.$datum;
    $a = explode(':',array_keys($data)[0]);
    echo $datum.'== '.$a[$key]."<br>";
}
echo "<pre>";
print_r($data[array_keys($data)[0]]);
echo "</pre>";

echo "<pre>";
print_r(array_keys($data)[0]);
echo "</pre>";
$a = explode(':',array_keys($data)[0]);
echo "<pre>";
print_r($a);
echo "</pre>";




die;




$r = array_keys($data);
$key = explode(':',array_keys($data)[0]);
echo "<pre>";
print_r($key);
var_dump($key);
echo "</pre>";
$res='';
function foo($x) {

    $this->bind_param($x);
}
foreach ($data as $k => $value) {
    var_dump($value);
    //$this->bind_param(explode(':',array_keys($data)[0]),$value);
    $res[] = explode(':',array_keys($data)[0]).'+'.$value;
    $this->pind_param($value);

    echo "<pre>";
    print_r($res);
    echo "</pre>";
}
echo "<pre>";
print_r($res);
echo "</pre>";
function getParams($params=[]) {

}

$options = array(
    's:s:s' =>array('data1', 'data2', 'data3'),
    's:i:s' =>array('data1', 'data2', 'data3')
);

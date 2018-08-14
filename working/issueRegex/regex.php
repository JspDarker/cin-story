<?php $string = 'Hello, this is coding Rainbow 999 999-222-3333 (333)-888-3232-2323232-2';

$phone_vn = '\+84\d{9,10}';
$select_word = "\b\w{2}\b";

$name_regex = '/[a-zA-z]+\s/';
$obj = 'Thanh   nhat     Dao';
$f[] = preg_match($name_regex,$obj);

var_dump($f);



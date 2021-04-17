<?php

$db['db_host'] = "sql304.epizy.com";
$db['db_user'] = "epiz_28412872";
$db['db_pass'] = "Q875yaQQsM";
$db['db_name'] = "epiz_28412872_useraccounts";

foreach($db as $key => $value) {

  define(strtoupper($key), $value);

}


$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

//if($connection) {
//     echo "we are connected";
// } else {
//      die("database connection failed");
//  }



?>
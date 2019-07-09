<?php
$db['db_host']="127.0.0.1";
$db['db_user']="kenyawea_backoffice";
$db['db_pass']="DB@SWKPortal!";
$db['db_name']="kenyawea_spinners_portal";

foreach ($db as $key => $value) {
  define(strtoupper($key), $value);

}

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if ($connection) {
  // echo "we are connected";
}
else{
  die("Some error occurred during connection " . mysqli_error($connection));
}


 ?>

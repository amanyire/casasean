<?php
require_once("connect.php");
date_default_timezone_set('Africa/Nairobi');
function clean_data($data){
$data=trim($data);
//$data=stripslashes($data);//
//$data=mysql_real_escape_string($data);
//$data=htmlspecialchars($data);
return $data;
}
?>

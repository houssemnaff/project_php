<?php
$servername="localhost";
$username="root";
$password="";
$db_name="monshop";
$con=new mysqli($servername,$username,'',$db_name,3306);
if($con->connect_error){
    die("connection failed".$con->connect_error);
}
//else{
//	echo " connection successful";
//}


?>
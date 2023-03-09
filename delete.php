<?php


include "classes/user.php";
$user1 = new User();

$sl = $_GET['sl'];
$user1->delete_user($sl);


?>
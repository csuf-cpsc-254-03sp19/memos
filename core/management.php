<?php session_start();
if(!isset($_SESSION['rankid'])){header("Location: login.php?return=" . basename($_SERVER['PHP_SELF']));}

if($_SESSION['rankid'] != 2){
	header("Location: badrank.php");
}

if($_SESSION['active'] > 0){}
else{header("Location: logout.php");}
?>

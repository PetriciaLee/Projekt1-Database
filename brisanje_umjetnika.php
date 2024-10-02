<?php
    error_reporting(E_ERROR);
    ini_set('display_errors', 1);

	include 'spajanje_bp.php';
    mysqli_query($con, "SET NAMES UTF8");

    $id = $_GET['id'];
    $upit = "DELETE FROM Umjetnik WHERE ID_Umjetnik = '$id' ";
	mysqli_query ($con,$upit) or die (mysqli_error());
	header('Location: index.php');
	
?>
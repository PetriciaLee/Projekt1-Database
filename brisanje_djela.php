<?php
    error_reporting(E_ERROR);
    ini_set('display_errors', 1);

	include 'spajanje_bp.php';
    mysqli_query($con, "SET NAMES UTF8");

    $id = $_GET['id'];
    $upit = "DELETE FROM Djela WHERE ID_Djela = '$id' ";
	mysqli_query ($con,$upit) or die (mysqli_error());
	header('Location: index.php');
	
?>
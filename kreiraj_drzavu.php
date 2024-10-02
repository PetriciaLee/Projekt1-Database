<?php
        error_reporting(E_ERROR);
        ini_set('display_errors',1);
        
        include 'spajanje_bp.php';
        mysqli_query ($con, "SET NAMES UTF8");
         $naziv_drzave = $_POST['naziv_drzave'];

        if(!$_POST['Unos']){
            echo "Popunite";
            header('Location: index.php');
        } else {
            mysqli_query ($con, "INSERT INTO Drzava (Naziv_drzave)
                VALUES ('$naziv_drzave')") or die (mysqli_error($con));
        header('Location: index.php');
        }
?>

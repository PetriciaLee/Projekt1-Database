<?php
        error_reporting(E_ERROR);
        ini_set('display_errors',1);
        
        include 'spajanje_bp.php';
        mysqli_query ($_con, "SET NAMES UTF8");
         $pokret = $_POST['pokret'];

        if(!$_POST['Unos']){
            echo "Popunite";
            header('Location: index.php');
        } else {
            mysqli_query ($con, "INSERT INTO Pokret (Vrsta_pokreta)
                VALUES ('$pokret')") or die (mysqli_error($con));
        header('Location: index.php');
        }
?>

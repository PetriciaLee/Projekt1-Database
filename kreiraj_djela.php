<?php
        error_reporting(E_ERROR);
        ini_set('display_errors',1);
        
        include 'spajanje_bp.php';
        mysqli_query ($_con, "SET NAMES UTF8");
         $djela = $_POST['djela'];
         $godina = $_POST['godina'];
         $umjetnik = $_POST['umjetnik'];
         $pokret = $_POST['Pokret'];

        if(!$_POST['Unos']){
            echo "Popunite";
            header('Location: index.php');
        } else {
            mysqli_query ($con, "INSERT INTO Djela (Naziv_djela, Godina, Umjetnik , Pokret)
                VALUES ('$djela','$godina','$umjetnik','$pokret')") or die (mysqli_error($con));
        header('Location: index.php');
        }
?>

<?php
        error_reporting(E_ERROR);
        ini_set('display_errors',1);
        
        include 'spajanje_bp.php';
        mysqli_query ($con, "SET NAMES UTF8");
         $Ime_prezime = $_POST['Ime_prezime'];
         $Drzava = $_POST['Drzava'];

        if(!$_POST['Unos']){
            echo "Popunite";
            header('Location:index.php');
        } else {
            mysqli_query ($con, "INSERT INTO Umjetnik (Ime_prezime, Drzava)
                VALUES ('$Ime_prezime', '$Drzava')") or die (mysqli_error($con));
        header('Location: index.php');
        }
?>

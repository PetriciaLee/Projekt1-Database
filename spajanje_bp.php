<?php
  $dbhost = 'localhost';
  $dbuser = 'jakpetra_Projekt';
  $dbpass = 'Projekt12';
  $db = 'jakpetra_Projekt-1';

  $con = mysqli_connect ($dbhost,$dbuser,$dbpass,$db);

  if (mysqli_connect_errno()){
      echo "Neuspjelo spajanje na BP";
  }
?>

<!DOCTYPE>
<html>
<head>
<title>Naslovna | Nadrealizam </title>
<meta>
<link rel="stylesheet" type="text/css" media="screen, projection" href="style.css" />
<link href="jquery-3.1.1.min.js">
<link rel="shortcut icon" href="ikona.png" />
<style type="text/css">
.izbornik{
    position: fixed;
    width: 100%;
}
.topnav {
  overflow: hidden;
  background-color: #ba5354;
  z-index: 5;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  z-index: 5;
  font-size: 17px;
}

.active {
  background-color:  #e2a961;
  color: white;
}

.topnav .icon {
  display: none;
  background-image: url()
}

.dropdown {
    float: left;
    overflow: hidden;
}

.dropdown .dropbtn {
    font-size: 17px;    
    border: none;
    outline: none;
    color: white;
    padding: 14px 16px;
    background-color: inherit;
    font-family: inherit;
    margin: 0;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #e2a961;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    float: none;
    color: white;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.topnav a:hover, .dropdown:hover .dropbtn {
  background-color: #bc7d2d;
  color: white;
}

.dropdown-content a:hover {
    background-color: #bc7d2d;
    color: black;
}

.dropdown:hover .dropdown-content {
    display: block;
}

@media screen and (max-width: 1000px) {
  .topnav a:not(:first-child), .dropdown .dropbtn {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 1000px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dropdown {float: none;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
}
</style>
</head>
<div class="izbornik">
<div class="topnav" id="myTopnav">
  <a href="../index1.html">Početna</a>
  <a href="Projekt1/index.php" class="active">Aplikacija</a>
<div class="dropdown">
<button class="dropbtn">Umjetnici 
<i class="fa fa-caret-down"></i>
</button>
    
<div class="dropdown-content">
    <a href="../Projekt1.html" target="_blank">Salvador Dali</a>
    <a href="../index2.html" target="_blank">Frida Kahlo</a>
    <a href="../index.html" target="_blank">Rene Magritte</a>
    <a href="../max.html" target="_blank">Max Ernst</a>
    <a href="../miro.html" target="_blank">Joan Miro</a>
    <a href="../pablo.html" target="_blank">Pablo Picasso</a>
    <a href="../lea.html" target="_blank">Leonora Carrington</a>
</div>
  </div> 
    <a href="../kontakt.html">Kontakt</a>
    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onClick="myFunction()">&#9776;</a>
</div>
</div> 
    <body background="logo.jpg">
<body><div id="logo"><a name ="sidro"></a></div>
    <div id="logo"><img src="log.png"></div>

    <?php
        error_reporting(E_ERROR);
        ini_set('display_errors',1);
        
        mysqli_query ($con, "SET NAMES UTF8");
        include 'spajanje_bp.php';
        include 'kreiraj_tablice.php';
    ?>  
        
        <br><br>
    <div id="sadrzaj"><br><br><br>
    
        <!--  Obrazac za unos Države -->
        <form class="box_obrazac" action="kreiraj_drzavu.php" method="post">
         <input type="text" class="obrazac" placeholder="Država" name="naziv_drzave">
            <br>
         <input type="submit" class="button" value="Unesi naziv države" name="Unos">
        <br>
        
        
        <!--  Ispis tablice Država -->
        <?php
            $upit = "SELECT * FROM Drzava"; //ispis tablice Knjiga
            $rezultat = mysqli_query ($con, $upit);
            echo "<table border=1 bgcolor=#ffedcc width=40% align=center >
                    <tr>
                        <th>ID</th>
                        <th>Naziv države</th>
                    </tr>";
            while($drzava = mysqli_fetch_array($rezultat)){
                echo "<tr>";
                echo "<td>" . $drzava['ID_drzava'] . "</td>";
                echo "<td>" . $drzava['Naziv_drzave'] . "</td>";
                echo "<td>" . "<a href=\"brisanje_drzave.php?id=" . $drzava['ID_drzava'] . "\">Ukloni</a>" . "</td>";
            echo "</tr>";
            }
            echo "</table>"; 
        ?>
        </form>
        <br>
        
    <!--  Obrazac za unos Umjetnika -->
        <form class="box_obrazac" action="kreiraj_umjetnika.php" method="post">
         <input type="text" class="obrazac" placeholder="Ime i prezime umjetnika" name="Ime_prezime"><br>
         Država
         <select name="Drzava">
            <?php
            $upit1 = "SELECT * FROM Drzava";
            $rezultat1 = mysqli_query($con,$upit1);
                while($knjiga = mysqli_fetch_array($rezultat1)) {
                echo "<option name ='Drzava' value=" . $knjiga['ID_drzava'] . ">"  ." " . $knjiga['Naziv_drzave'] ."</option>";
            } 
            ?>
            </select>
         <br>
         <input type="submit" class="button" value="Unesite umjetnika" name="Unos">
        <br>
    
    
         <!--  Ispis tablice Umjetnik -->
        <?php
            $upit = "SELECT Umjetnik.ID_Umjetnik, Umjetnik.Ime_prezime, Drzava.Naziv_drzave 
			     FROM Drzava
			     INNER JOIN 
			     Umjetnik ON Drzava.ID_Drzava = Umjetnik.Drzava"; //ispis tablice Umjetnik
            $rezultat = mysqli_query ($con, $upit);
            echo "<table border=1 bgcolor=#ffedcc width=40% align=center>
                    <tr>
                        <th>ID</th>
                        <th>Ime i prezime</th>
                        <th>Država</th>
                    </tr>";
            while($umjetnik = mysqli_fetch_array($rezultat)){
                echo "<tr>";
                echo "<td>" . $umjetnik['ID_Umjetnik'] . "</td>";
                echo "<td>" . $umjetnik['Ime_prezime'] . "</td>";
                echo "<td>" . $umjetnik['Naziv_drzave'] . "</td>";
                echo "<td>" . "<a href=\"brisanje_umjetnika.php?id=" . $umjetnik['ID_Umjetnik'] . "\">Ukloni</a>" . "</td>";
            echo "</tr>";
            }
            echo "</table>"; 
        ?> </form>
        <br>
        <br>    
        <!--  Obrazac za unos Umjetničkog pokreta -->
        <form class="box_obrazac" action="kreiraj_pokret.php" method="post">
         <input type="text" class="obrazac" placeholder="Naziv umjetničkog pokreta" name="pokret"><br>
         <input type="submit" class="button" value="Unesi umjetnički pokret" name="Unos">
         <br />
         
       <!--  Ispis tablice Umjetnički pokret -->
        <?php
            $upit = "SELECT * FROM Pokret"; //ispis tablice Umjetnički pokret
            $rezultat = mysqli_query ($con, $upit);
            echo "<table border=1 bgcolor=#ffedcc width=40% align=center>
                    <tr>
                        <th>ID</th>
                        <th>Naziv umjetničkog pokreta</th>
                    </tr>";
            while($pokret = mysqli_fetch_array($rezultat)){
                echo "<tr>";
                echo "<td>" . $pokret['ID_Pokret'] . "</td>";
                echo "<td>" . $pokret['Vrsta_pokreta'] . "</td>";
                echo "<td>" . "<a href=\"brisanje_pokreta.php?id=" . $pokret['ID_Pokret'] . "\">Ukloni</a>" . "</td>";
            echo "</tr>";
            }
            echo "</table>"; 
        ?> </form>
        
        <br>
        <br>
         <!--  Obrazac za unos Umjetničkog djela -->
        <form class="box_obrazac" action="kreiraj_djela.php" method="post">
              <input type="text" class="obrazac" placeholder="Naziv umjetničkog djela" name="djela">
              <input type="text" class="obrazac" placeholder="Godina izrade" name="godina">
              <br />
              Umjetnik
              <select name="umjetnik">
            <?php
            $upit1 = "SELECT * FROM Umjetnik";
            $rezultat1 = mysqli_query($con,$upit1);
                while($umjetnik = mysqli_fetch_array($rezultat1)) {
                echo "<option name ='umjetnik' value=" . $umjetnik['ID_Umjetnik'] . ">"  ." " . $umjetnik['Ime_prezime'] ."</option>";
            } 
            ?>
            </select>
              
              Pokret
              <select name="Pokret">
            <?php
            $upit1 = "SELECT * FROM Pokret";
            $rezultat1 = mysqli_query($con,$upit1);
                while($pokret = mysqli_fetch_array($rezultat1)) {
                echo "<option name ='Knjiga' value=" . $pokret['ID_Pokret'] . ">"  ." " . $pokret['Vrsta_pokreta'] ."</option>";
            } 
            ?>
            </select>
         <input type="submit" class="button" value="Unesi umjetničko djelo" name="Unos">
         <br />
       <!--  Ispis tablice Umjetnička djela -->
        <?php
            $upit = "SELECT * FROM Djela"; //ispis tablice Umjetnička djela
            $rezultat = mysqli_query ($con, $upit);
            echo "<table border=1 bgcolor=#ffedcc width=80% align=center>
                    <tr>
                        <th>ID</th>
                        <th>Naziv umjetničkog djela</th>
                        <th>Godina izrade</th>
                        <th>Umjetnik</th>
                        <th>Pokret</th>
                    </tr>";
            while($djela = mysqli_fetch_array($rezultat)){
                echo "<tr>";
                echo "<td>" . $djela['ID_Djela'] . "</td>";
                echo "<td>" . $djela['Naziv_djela'] . "</td>";
                echo "<td>" . $djela['Godina'] . "</td>";
                echo "<td>" . $djela['ID_Umjetnik'] . "</td>";
                 echo "<td>" . $djela['ID_Pokret'] . "</td>";
                echo "<td>" . "<a href=\"brisanje_djela.php?id=" . $djela['ID_Djela'] . "\">Ukloni</a>" . "</td>";
            echo "</tr>";
            }
            echo "</table>"; 
        ?> </form>
 
    <p align="right"><a href="#sidro"><img src="slike/gumb.png" alt="Top" width="5%"/></a></p>
       
        
    </div>
    <footer>
      &copy; 21.12.2017. | Designed by: Petra Jakopović, 4. Web
    </footer>
<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
<script>
filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("column");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}


// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>
</body>
</html>

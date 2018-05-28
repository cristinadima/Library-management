

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Biblioteca</title>
    <link rel="stylesheet" href="autori.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	 <header>
   		<a href ="#" id="logo"></a>
   		<nav>
   			<a href="#" id="menu-icon"></a>
   			<ul>
   				<li><a href="#" class="current">Prezentare</a></li>
   				<li><a href="servicii.html">Servicii</a></li>
   				<li><a href="publicatii.html">Publicatii</a></li>
   				<li><a href="proiecte.html">Proiecte</a></li>
 
         
            <button  style = "
	-moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
	-webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
	box-shadow:inset 0px 1px 0px 0px #ffffff;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ededed), color-stop(1, #dfdfdf));
	background:-moz-linear-gradient(top, #ededed 5%, #dfdfdf 100%);
	background:-webkit-linear-gradient(top, #ededed 5%, #dfdfdf 100%);
	background:-o-linear-gradient(top, #ededed 5%, #dfdfdf 100%);
	background:-ms-linear-gradient(top, #ededed 5%, #dfdfdf 100%);
	background:linear-gradient(to bottom, #ededed 5%, #dfdfdf 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ededed', endColorstr='#dfdfdf',GradientType=0);
	background-color:#ededed;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #dcdcdc;
	display:inline-block;
	cursor:pointer;
	color:#777777;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:0px 1px 0px #ffffff;
	margin-top: 2%;
	margin-bottom: 2%;
	" onclick="window.location.href='index.php'">Iesire</button>
      
   			</ul>
   		</nav>
    </header>



 <div class="wrapper">
    <div align="center" class="imagini">
    	<img src="http://res.cloudinary.com/dwraqpjau/image/upload/c_scale,w_150/v1526831093/if_add-to-database_49577_mbjvcp.png">
    </div>
    <div class="form1">
    	
	<form action="#" method="POST">

	       <label for="idname">ID_autor</label>
	      <input type="text" id="idname" name="id">
	      <br/>
	       <label for="pname">Prenume</label>
	      <input type="text" id="pname" name="prenume">
	      <br/>
	       <label for="nname">Nume</label>
	      <input type ="text" id="nname" name="nume">
	      <br/>
	      <div class="buttonHolder">
	      <input type="submit" name = "submit" value="Insereaza">
	      </div>
	 </form> 
	</div>
</div>
</body>
</html>

<?php
$server = "localhost";
$database = "biblioteca";
$username = "root";
$pass = "";

$conn = new mysqli($server, $username, $pass, $database);
   
if(isset($_POST['submit'])){
    $Id_autor = $_POST['id'];
    $Nume = $_POST['nume'];
	$Prenume = $_POST['prenume'];
	
	

    $sql = "INSERT INTO autori (id_autor, nume, prenume)
   				 VALUES ($Id_autor, '$Nume', '$Prenume')";

     if(!mysqli_query($conn, $sql))
     {
     	echo "<script type='text/javascript'>alert('A aparut o eroare!')</script>";
     }    else  {
     	echo "<script type='text/javascript'>alert('Randul a fost inserat cu succes!')</script>";
      header("Refresh:0; url=autori.php");
     }
 }
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Biblioteca</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div>
	<div class="imagini">
		<img src="http://res.cloudinary.com/dwraqpjau/image/upload/c_scale,w_150/v1526831263/if_download-database_49584_exxrmj.png">
	</div>
	<div class="form2">
   <form action="#" method="POST">
         ID_autor: <input type="text" name="id1">
         <br/>
         Prenume:<input type="text" name="prenume1">
         <br/>
         Nume: <input type ="text" name="nume1">
         <br/>
         <div class="buttonHolder">
         <input type="submit" name = "submit1" value="Modifica">
     </div>
    </form> 
</div>
</div>
</body>
</html>

<?php

if(isset($_POST['submit1'])){
   $Id_autor1 = $_POST['id1'];
    $Nume1 = $_POST['nume1'];
   $Prenume1 = $_POST['prenume1'];
  

   $result = $conn->query("SELECT * FROM autori WHERE id_autor=$Id_autor1");

   if ( $result->num_rows == 0 )
   { 
      echo "<script type='text/javascript'>alert('Autorul nu este inregistrat!')</script>";
   }
   else if (!mysqli_query($conn, "UPDATE autori SET nume='$Nume1', prenume='$Prenume1' WHERE id_autor=$Id_autor1"))
   {
      echo "<script type='text/javascript'>alert('Randul nu poate fi modificat!')</script>";
   }    
   else {
      echo "<script type='text/javascript'>alert('Randul a fost modificat cu succes!')</script>";
   }
}

  
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Biblioteca</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div>
	<div class ="imagini">
		<img src="http://res.cloudinary.com/dwraqpjau/image/upload/c_scale,w_150/v1526831148/if_remove-from-database_49610_qzeemi.png">
	</div>
	<div class="form2">
	<form action="#" method="POST">
	      Sterge autorul: <input type="text" name="id2">
	      <br/>
	      <div class="buttonHolder">
	      <input type="submit" name = "submit2" value="Sterge">
	  </div>
	 </form> 
	</div>
</div>
<footer class="footer">
    	<div class = "container">
    		<div class = "text-center">
    			<h1 style="color:#337ab7; text-shadow:2px 2px white;">BIBLIOTECA JUDETEANA "V. A. URECHIA" GALATI</h1>
    			<address>
    				Str. Mihai Bravu Nr. 16, Galati, 800208
    			</address>
    			<p>Copyright, 2018</p>
    		</div>
    	</div>
    </footer>
</body>
</html>

<?php



if(isset($_POST['submit2'])){
	$id_autor2 = $_POST['id2'];

	$result2 = $conn->query("SELECT * FROM autori WHERE id_autor=$id_autor2");

	if ( $result2->num_rows == 0 ){ // User doesn't exist
    	echo "<script type='text/javascript'>alert('Autorul nu este inregistrat!')</script>";
   
	}

     else if(!mysqli_query($conn, "DELETE FROM autori WHERE id_autor=$id_autor2"))
     {
     	echo "<script type='text/javascript'>alert('Randul nu poate fi sters!')</script>";
     }    else  {
     	echo "<script type='text/javascript'>alert('Randul a fost sters cu succes!')</script>";
     }
}




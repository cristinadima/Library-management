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
		 <label for="isbn">ISBN</label>
	      <input type="text" id ="isbn" name="id">
	      <br/>
	      <label for="titlu">Titlu</label>
	      <input type="text" id="titlu" name="titlu">
	      <br/>
	      <label for="editura">Editura</label>
	      <input type ="text" id="editura" name="editura">
	      <br/>
	      <label for="categorie">Categorie</label>
	      <input type ="text" id="categorie" name="categorie">
	      <br/>
	      <label for="limba">Limba</label>
	      <input type ="text" id="limba" name="limba">
	      <br/>
	      <label for="ida">ID_autor</label>
	      <input type ="text" id="ida" name="id_autor">
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
    $isbn = $_POST['id'];
	$titlu = $_POST['titlu'];
	$editura = $_POST['editura'];
	$categorie = $_POST['categorie'];
	$limba = $_POST['limba'];
	$id_autor = $_POST['id_autor'];
	$fk="SELECT * from autori where id_autor=$id_autor";
	$result = mysqli_query($conn, $fk);
	$num_rows = mysqli_num_rows($result);
	
	if($num_rows > 0)
	{ 
		$sql="INSERT INTO carti (ISBN, Titlu, Editura, Categorie, Limba, id_autor)
   					 VALUES ($isbn, '$titlu', '$editura', '$categorie', '$limba', $id_autor)";
   		 if(!mysqli_query($conn, $sql)){
   		 echo "<script type='text/javascript'>alert('A aparut o eroare!')</script>";
   		}
   		 else  {
     	echo "<script type='text/javascript'>alert('Randul a fost inserat cu succes!')</script>";
     }
     }	

     else
     {
     	echo "<script type='text/javascript'>alert('Autorul nu este inregistrat!')</script>";
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
	      ISBN: <input type="text" name="id1">
	      <br/>
	      Titlu:<input type="text" name="titlu1">
	      <br/>
	      Editura: <input type ="text" name="editura1">
	      <br/>
	      Categorie: <input type ="text" name="categorie1">
	      <br/>
	      Limba: <input type ="text" name="limba1">
	      <br/>
	      Id_autor: <input type ="text" name="id_autor1">
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
$server = "localhost";
$database = "biblioteca";
$username = "root";
$pass = "";

$conn = new mysqli($server, $username, $pass, $database);
   
if(isset($_POST['submit1'])){
    $isbn1 = $_POST['id1'];
	$titlu1 = $_POST['titlu1'];
	$editura1 = $_POST['editura1'];
	$categorie1 = $_POST['categorie1'];
	$limba1 = $_POST['limba1'];
	$id_autor1 = $_POST['id_autor1'];
	
	$result = $conn->query("SELECT * FROM carti WHERE ISBN=$isbn1");

	$fk="SELECT * from autori where id_autor=$id_autor1";
	$resultSet = mysqli_query($conn, $fk);
	$num_rows = mysqli_num_rows($resultSet);
	
	if($num_rows > 0){

   if ( $result->num_rows == 0 )
	   { 
	      echo "<script type='text/javascript'>alert('Cartea nu este inregistrata!')</script>";
	   }
   else if (!mysqli_query($conn, "UPDATE carti SET titlu='$titlu1', editura='$editura1', categorie='$categorie1', limba='$limba1', id_autor=$id_autor1 WHERE ISBN=$isbn1"))
	   {
	      echo "<script type='text/javascript'>alert('Randul nu poate fi modificat!')</script>";
	   }    
   else {
	     echo "<script type='text/javascript'>alert('Randul a fost modificat cu succes!')</script>";
	   }
	
	}
	else{
		echo "<script type='text/javascript'>alert('ID_autor nu exista!')</script>";
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
	      Sterge cartea: <input type="text" name="id2">
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
</body>
</html>

<?php

$server = "localhost";
$database = "biblioteca";
$username = "root";
$pass = "";

$conn = new mysqli($server, $username, $pass, $database);



if(isset($_POST['submit2'])){
	$isbn2 = $_POST['id2'];

	$result8 = $conn->query("SELECT * FROM carti WHERE ISBN=$isbn2");

	if ( $result8->num_rows == 0 ){ // User doesn't exist
    	echo "<script type='text/javascript'>alert('Cartea nu este inregistrata!')</script>";
   
	}

     else if(!mysqli_query($conn, "DELETE FROM carti WHERE ISBN=$isbn2"))
     {
     	echo "<script type='text/javascript'>alert('Randul nu poate fi sters!')</script>";
     }    else  {
     	echo "<script type='text/javascript'>alert('Randul a fost sters cu succes!')</script>";
     }
}


?>
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
		ID_imprumut: <input type="text" name="id">
	      <br/>
	      ID_cititor: <input type="text" name="id_cit">
	      <br/>
	      ISBN: <input type="text" name="isbn">
	      <br/>
	      Data imprumut:<input type="text" name="imprumut">
	      <br/>
	      Data returnare: <input type ="text" name="returnare">
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
	$id_imprumut = $_POST['id'];
	$id_cititor = $_POST['id_cit'];
    $isbn = $_POST['isbn'];
	$data_imprumut = $_POST['imprumut'];
	$data_returnare = $_POST['returnare'];
	$fk1="SELECT * from cititori where id_cititor=$id_cititor";
	$result1 = mysqli_query($conn, $fk1);
	$num_rows1 = mysqli_num_rows($result1);

	$fk2="SELECT * from carti where ISBN=$isbn";
	$result2 = mysqli_query($conn, $fk2);
	$num_rows2 = mysqli_num_rows($result2);

	
	if($num_rows1 > 0 && $num_rows2 > 0 )
	{ 
		$sql="INSERT INTO imprumuturi (id_imprumut, id_cititor, ISBN, data_imprumut, data_returnare)
   					 VALUES ($id_imprumut, $id_cititor, $isbn, '$data_imprumut', '$data_returnare')";
   		 mysqli_query($conn, $sql);
   		 echo "<script type='text/javascript'>alert('Randul a fost inserat cu succes!')</script>";
     }	

     else
     {
     	echo "<script type='text/javascript'>alert('A aparut o eroare! ID_cititor sau ID_carte nu exista!')</script>";
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
		  ID_imprumut: <input type="text" name="id1">
	      <br/>
	      ID_cititor: <input type="text" name="id_cit1">
	      <br/>
	      ISBN: <input type="text" name="isbn1">
	      <br/>
	      Data imprumut:<input type="text" name="imprumut1">
	      <br/>
	      Data returnare: <input type ="text" name="returnare1">
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
	$id_imprumut1 = $_POST['id1'];
	$id_cititor1 = $_POST['id_cit1'];
    $isbn1 = $_POST['isbn1'];
	$data_imprumut1 = $_POST['imprumut1'];
	$data_returnare1 = $_POST['returnare1'];

	$result = $conn->query("SELECT * FROM imprumuturi WHERE id_imprumut=$id_imprumut1");

	$fk1="SELECT * from cititori where id_cititor=$id_cititor1";
	$resultSet1 = mysqli_query($conn, $fk1);
	$num_rows1 = mysqli_num_rows($resultSet1);

	$fk2="SELECT * from carti where ISBN=$isbn1";
	$resultSet2 = mysqli_query($conn, $fk2);
	$num_rows2 = mysqli_num_rows($resultSet2);

	
	if($num_rows1 > 0 && $num_rows2 > 0 ){
		 if ( $result->num_rows == 0 )
	   { 
	   	echo "<script type='text/javascript'>alert('Imprumutul nu este inregistrat!')</script>";
	   }
		else if (!mysqli_query($conn,"UPDATE imprumuturi SET data_imprumut='$data_imprumut1', data_returnare='$data_returnare1', id_cititor=$id_cititor1, ISBN=$isbn1 WHERE id_imprumut=$id_imprumut1"))
		{
			  echo "<script type='text/javascript'>alert('Randul nu poate fi modificat!')</script>";
		}
   		else{
   		 echo "<script type='text/javascript'>alert('Randul a fost modificat cu succes!')</script>";
   		}
     }	

     else
     {
     	echo "<script type='text/javascript'>alert('id_cititor sau id_carte nu exista!')</script>";
     	
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
	      Sterge imprumutul: <input type="text" name="id2">
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

$server = "localhost";
$database = "biblioteca";
$username = "root";
$pass = "";

$conn = new mysqli($server, $username, $pass, $database);



if(isset($_POST['submit2'])){
	$id_imprumut2 = $_POST['id2'];

	$result = $conn->query("SELECT * FROM imprumuturi WHERE id_imprumut=$id_imprumut2");

	if ( $result->num_rows == 0 ){ // User doesn't exist
    	echo "<script type='text/javascript'>alert('Imprumutul nu este inregistrat!')</script>";
   
	}

     else if(!mysqli_query($conn, "DELETE FROM imprumuturi WHERE id_imprumut=$id_imprumut2"))
     {
     	echo "<script type='text/javascript'>alert('Randul nu poate fi sters!')</script>";
     }    else  {
     	echo "<script type='text/javascript'>alert('Randul a fost sters cu succes!')</script>";
     }
}


?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Biblioteca</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="vizualizare.css">
    <link rel="stylesheet" href="blueberry.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
    <script src="jquery.blueberry.js"></script>
    <script>
    	$(window).load(function(){
    		$('.blueberry').blueberry();
    	});
    </script>
</head>

<body>
<header>
   		<a href ="#" id="logo"></a>
   		
         
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
	margin-top: 40px;
	margin-bottom: 1%;
	margin-right: 2%;
	float:right;
	margin-left:20px;
	" onclick="window.location.href='index.php'">Iesire</button>
      
   			</ul>
   		</nav>
    </header>


<?php


    

$server1 = "localhost";
$database1 = "biblioteca";
$username1 = "root";
$pass1 = "";


// Create connection
$conn1 = new PDO("mysql:host=$server1;dbname=$database1", $username1, $pass1);


$query = "select * from autori";

$data=$conn1->query($query);

echo '<h1 class="titlu">Continutul tabelei autori este:</h1>';

echo '<table align = "center" width="70%" border="1" cellpadding="5" cellspacing="5">
<tr>
<th>Id_autor</th>
<th>Prenume</th>
<th>Nume</th>
</tr>';
foreach($data as $row)
{
	echo '<tr>
	<td>'.$row["id_autor"].'</td>
	<td>'.$row["prenume"].'</td>
	<td>'.$row["nume"].'</td>
	
	
	</tr>';
}

echo '</table>';

   ?>
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
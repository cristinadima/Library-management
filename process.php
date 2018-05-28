<?php
$server = "localhost";
$database = "biblioteca";
$db_username = "root";
$pass = "";


// Create connection
$conn = new mysqli($server, $db_username, $pass, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


/* User login process, checks if user exists and password is correct */

// Escape email to protect against SQL injections
$username = $conn->escape_string($_POST['username']);
$result = $conn->query("SELECT * FROM login WHERE id_cititor='$username'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    echo 'Codul de utilizator nu este inregistrat!';
   
}
else { // User exists
    $user = $result->fetch_assoc();


    if ( $_POST['password'] == $user['parola'] ) {

    	if($user['rol'] == 'admin'){
    		include 'admin.html';
    	}
    	else{//user
?>
            <!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Biblioteca</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="vizualizare.css">
  
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


<?php
    		$query = "select imprumuturi.id_imprumut, carti.Titlu, autori.nume, autori.prenume, carti.Editura, imprumuturi.data_imprumut, imprumuturi.data_returnare
                        from imprumuturi, carti, autori 
                        where imprumuturi.ISBN=carti.ISBN
                        and carti.id_autor=autori.id_autor
                        and imprumuturi.id_cititor='$username'";


            $data=$conn->query($query);

            echo '<h1 class = "titlu">Cartile imprumutate de dumneavoastra pana acum sunt:</h1>';

            echo '
            
            <table align="center" width="70%" border="1" cellpadding="5" cellspacing="5" class="tabel">
            <tr>
            <th>Id_imprumut</th>
            <th>Titlu</th>
            <th>Prenume autor</th>
            <th>Nume autor</th>
            <th>Editura</th>
            <th>Data imprumut</th>
            <th>Data returnare</th>
            </tr>';
            foreach($data as $row)
            {
                echo '<tr>
                <td>'.$row["id_imprumut"].'</td>
                <td>'.$row["Titlu"].'</td>
                <td>'.$row["prenume"].'</td>
                <td>'.$row["nume"].'</td>
                <td>'.$row["Editura"].'</td>
                <td>'.$row["data_imprumut"].'</td>
                <td>'.$row["data_returnare"].'</td>
                
                
                </tr>';
            }

            echo '</table>';
                	}
    	
       

      
    }
    else {
      
        echo "<script type='text/javascript'>alert('Cod de utilizator sau parola incorecta!')</script>";
    }
}

   
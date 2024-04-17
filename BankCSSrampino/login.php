<?php
session_start();
// Connessione al database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "banca";

$conn = new mysqli($servername, $username, $password, $dbname);

if(!$conn){
   echo "Errore nella connessione!";
}

    $CF = $_POST['CF'];
    $pw = $_POST['password'];

	$pw_MD5=md5($pw);

	$query="SELECT * 
		FROM utente 
		WHERE CF='$CF' AND password='$pw_MD5'";
		
	$result = mysqli_query($conn ,$query);
					
    if ($result->num_rows > 0) {
        // Accesso autorizzato

        $_SESSION['CF']=$CF;

        echo "Accesso autorizzato";
        header("location:Conto.php"); 

    } else {
        // Utente e/o password errati
        echo "Utente e/o password errati";
    }


$conn->close();
?>

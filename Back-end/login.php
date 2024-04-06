<?php
// Connessione al database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if(!$conn){
   echo "Errore nella connessione!";
}

    $username = $_POST['username'];
    $password = $_POST['password'];

	$pw_MD5=md5($password);

	$query="SELECT * 
		FROM users 
		WHERE username='$username' AND password='$pw_MD5'";
		
	$result = mysqli_query($conn ,$query);
					
    if ($result->num_rows > 0) {
        // Accesso autorizzato
        echo "Accesso autorizzato";
    } else {
        // Utente e/o password errati
        echo "Utente e/o password errati";
    }


$conn->close();
?>

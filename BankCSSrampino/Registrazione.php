<?php

session_start();

// Connessione al database
$servername = "localhost" ;
$username = "root" ;
$password="";
$dbname = "banca";
$conn =mysqli_connect ($servername,$username, $password,$dbname);
if(!$conn){
echo "Errore nella connessione!";
}
	$CF = $_POST['CF'];
	$indirizzo= $_POST['indirizzo'];
	$DDN= $_POST['DDN'];
	$telefono= $_POST['telefono'];
	$email= $_POST['email'];
	$pw = $_POST[ 'password'];
	$pw_MD5=md5 ($pw) ;

	$query="INSERT INTO utente
	( CF, indirizzo, DDN, telefono, email, password)
		VALUES ('$CF','$indirizzo', '$DDN', '$telefono', '$email', '$pw_MD5')";

	$result = mysqli_query($conn, $query);

	if ($result > 0) {
	// Accesso autorizzato
	
	$_SESSION['CF']=$CF;

	echo "Registrazione effettuata correttamente";
	header("Location:login.html");


	} 
	else{
	
	echo "Registrazione fallita";
	}
	if(!$result){
	echo "Errore";
	}
	$conn->close();
?>

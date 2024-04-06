<?php
// Connessione al database
$servername = "localhost" ;
$username = "root" ;
$password="";
$dbname = "test";
$conn =mysqli_connect ($servername,$username, $password,$dbname);
if(!$conn){
echo "Errore nella connessione!";
}
	$username = $_POST['username'];
	$pw = $_POST[ 'password'];
	$pw_MD5=md5 ($pw) ;

	$query="INSERT INTO users
	(id, username, password)
		VALUES ('NULL', '$username', '$pw_MD5')";

	$result = mysqli_query($conn, $query);

	if ($result > 0) {
	// Accesso autorizzato
	echo "Registrazione effettuata correttamente";
	} 
	else{
	// Utente e/o password errati
	echo "Registrazione fallita";
	}
	if(!$result){
	echo "Errore";
	}
	$conn->close();
?>

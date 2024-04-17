<?php
 

 $server="localhost";
 $username="root";
 $password="";
 $db_name="banca";

 $connect=mysqli_connect($server,$username,$password,$db_name);

 if(!$connect){

     echo 'Errore nella connessione al database';
 }
 

?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <title>Transazioni</title>
</head>
<body>
  <div class="form-container">
  <h2>Effettua nuova transazione</h2>
  <form action="creaTransazioni.php" method="POST">
  <input type="hidden" id="IBAN" name="IBAN" value="<?php $IBAN=$_GET['IBAN_MIT']; echo $IBAN;?>">
    <label for="IBAN_RIC">IBAN DESTINATARIO:</label><br>
    <input type="text" id="IBAN_RIC" name="IBAN_RIC" required><br>
    <label for="somma">somma:</label><br>
    <input type="text" id="somma" name="somma" required><br>
    <button type="submit">Crea</button>

  </form>
  <h2>MOSTRA Transazioni</h2>
  <?php
   	
 		session_start();
	   $IBAN=$_GET['IBAN_MIT'];
		$query="SELECT * 
	   FROM transazione 
		WHERE IBAN_MIT='$IBAN' ";

	$result = mysqli_query($connect ,$query);
	echo 'USCITE';
	echo '<br>';
	echo '<br>';
	while($row=mysqli_fetch_assoc($result)){
		  echo '<div>';
		  echo 'IBAN mittente: ';
		   echo $row['IBAN_MIT'] ;
		   echo ' ';
		   echo 'IBAN destinatario: ';
		   echo $row['IBAN_RIC'] ; 
		   echo ' ';
		   echo 'SOMMA: ';
		   echo $row['somma'] ;
		   echo '€';
	   echo '</div>';

	}
	
	
	$query="SELECT * 
	   FROM transazione 
		WHERE IBAN_RIC='$IBAN' ";
		$result = mysqli_query($connect ,$query);
		echo '<br>';
		echo 'ENTRATE';
		echo '<br>';
		echo '<br>';
		while($row=mysqli_fetch_assoc($result)){
			echo '<div>';
			echo 'IBAN mittente: ';
			 echo $row['IBAN_MIT'] ;
			 echo ' ';
			 echo 'IBAN destinatario: ';
			 echo $row['IBAN_RIC'] ; 
			 echo ' ';
			 echo 'SOMMA: ';
			 echo $row['somma'] ;
			 echo '€';
		 echo '</div>';
  
	  }
	  

		  
	  ?>

</div>
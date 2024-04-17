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
  <title>Conto</title>
</head>
<body>
  <div class="form-container">
  <h2>CREA NUOVO CONTO</h2>
  <form action="createConto.php" method="POST">
    <label for="IBAN">IBAN:</label><br>
    <input type="text" id="IBAN" name="IBAN" required><br>
    <label for="saldo">saldo:</label><br>
    <input type="text" id="saldo" name="saldo" required><br>
    <button type="submit">Crea</button>
  </form>
  <h2>MOSTRA CONTI</h2>
  <?php
   	session_start();
   	 $CF=$_SESSION['CF'];

	 $query="SELECT * 
		FROM contobancario 
	 	WHERE CF='$CF' ";

	 $result = mysqli_query($connect ,$query);

	 while($row=mysqli_fetch_assoc($result)){
		
	       echo '
		   <div>';
		   echo 'IBAN: ';
			echo $row['IBAN'] ;
			echo ' ';
			echo 'Saldo: ';
			echo $row['saldo'] ; 
			echo '€';
			echo ' ';
			$IBAN_SES=$row['IBAN'];
			echo '<a title="apri conto" href="transazioni.php?IBAN_MIT='. $IBAN_SES .'"><button type="submit">apri</button></a>';
		echo '</div>';
 
 	}
	
	
	
   		
   	?>
	

</div>
</body>
</html>
<?php
 
 session_start();

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
   
   </head>
   
   <body>
   
   	<?php
   	
   	 $CF=$_SESSION['CF'];
	 $query="SELECT * 
		FROM contobancario 
	 	WHERE CF='$CF' ";

	 $result = mysqli_query($connect ,$query);

	 while($row=mysqli_fetch_assoc($result)){
	       echo '<div>';
		   echo 'IBAN: ';
			echo $row['IBAN'] ;
			echo ' ';
			echo 'Saldo: ';
			echo $row['saldo'] ; 
			echo '€';
		echo '</div>';
 
 	}
   		
   	?>
   
   </body>

</html>



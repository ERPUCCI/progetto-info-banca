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
<html>

   <head>
   
   </head>
   
   <body>
   
   	<?php
   	
   	 $IBAN=$_SESSION['IBAN_MIT'];
	 $query="SELECT * 
		FROM transazione 
	 	WHERE IBAN_MIT='$IBAN' ";

	 $result = mysqli_query($connect ,$query);

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
   
   </body>

</html>



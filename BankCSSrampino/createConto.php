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

    $iban=$_POST['IBAN'];
    $saldo=$_POST['saldo'];
    
    $cf=$_SESSION['CF'];

    $sql="INSERT INTO contobancario (IBAN,saldo,CF)
         VALUES('$iban',$saldo,'$cf')";

    $result=mysqli_query($connect,$sql);

    if($result){
      
        header("Location:Conto.php");
    }
    else{

        echo '<script>';
            echo 'alert("Si è verificato un errore !");';
        echo '</script>';
    }



?>
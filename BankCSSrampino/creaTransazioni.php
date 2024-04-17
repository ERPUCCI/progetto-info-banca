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

    $IBAN_RIC=$_POST['IBAN_RIC'];
    $somma=$_POST['somma'];
    
    $IBAN_MIT=$_POST['IBAN'];

    $sql="INSERT INTO transazione (IBAN_RIC,somma,IBAN_MIT)
         VALUES('$IBAN_RIC','$somma','$IBAN_MIT')";

    $result=mysqli_query($connect,$sql);

    if($result){
        $saldo_mit="SELECT saldo FROM contobancario WHERE IBAN_MIT";
        $saldo_mit = (int) $saldo_mit;
        $saldo = (int) $saldo;
        $saldo_mit -= $saldo;

        $saldo_ric="SELECT saldo FROM contobancario WHERE IBAN_RIC";
        $saldo_ric = (int) $saldo_ric;
        $saldo_ric -= $saldo;

        $UPDATE1="UPDATE contobancario
        SET saldo=$saldo_mit
        WHERE IBAN=$IBAN_MIT;";

        $UPDATE2="UPDATE contobancario
        SET saldo=$saldo_ric
        WHERE IBAN=$IBAN_RIC;";
/*
    $result1=mysqli_query($connect,$UPDATE1);
    $result2=mysqli_query($connect,$UPDATE2);
    }
    if($result1>0 && $result2>0){
 */       header("Location:Conto.php");
    }
    else{

       
        header("Location:Conto.php");
        echo '<script>';
        echo 'alert("Si è verificato un errore !");';
    echo '</script>';
    }



?>
<?php
include_once("connect.php");
//Načtení odeslaného jména a hesla
$jmeno=htmlspecialchars($_POST['jmeno']);
$heslo=md5($_POST['heslo']);

//Udáje od databáze, do které se chceme připojit
$servername="localhost";
$username="root";
$password="";
$dbname="web_sp";
$conn=mysqli_connect($servername,$username,$password,$dbname);
//Zajištění že se budou data načítat i v češtině
$conn->query('set character_set_client=utf8');
$conn->query('set character_set_connection=utf8');
$conn->query('set character_set_results=utf8');
$conn->query('set character_set_server=utf8');

//Porovnávání jména a hesla z databáze
$log=mysqli_query($conn, "SELECT * FROM autori WHERE uzjmeno='$jmeno' AND heslo='$heslo' ");
$logi=mysqli_query($conn, "SELECT * FROM recenzenti WHERE uzjmeno='$jmeno' AND heslo='$heslo' ");
$pocet=mysqli_num_rows($log);
$pocet2=mysqli_num_rows($logi);
//Pokud jsou údaje od admina
if($jmeno == "admin" && $heslo == md5("admin")) {
    session_start();
$_SESSION['jmeno'] = $jmeno;
	header('Location: admin_menu.php');
	}

//Pokud jsou údaje od autora
else if($pocet==1){
    session_start();
$_SESSION['jmeno']=$jmeno;
      header('Location: autori_menu.php');
    }

//Pokud jsou údaje od recenzenta
else if($pocet2==1){
    session_start();
$_SESSION['jmeno']=$jmeno;
      header('Location: recenzenti_menu.php');
    }

//Pokud jsou údaje špatné
	else {
		header('Location: prihlaseni.php');
	}
		
?>

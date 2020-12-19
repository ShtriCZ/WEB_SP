<?php
include_once("connect.php");
$jmeno=htmlspecialchars($_POST['jmeno']);
$heslo=md5($_POST['heslo']);
$log=mysqli_query($conn, "SELECT * FROM autori WHERE uzjmeno='$jmeno' AND heslo='$heslo' ");
$logi=mysqli_query($conn, "SELECT * FROM recenzenti WHERE uzjmeno='$jmeno' AND heslo='$heslo' ");
$pocet=mysqli_num_rows($log);
$pocet2=mysqli_num_rows($logi);
if($jmeno == "admin" && $heslo == md5("admin")) {
    session_start();
$_SESSION['jmeno'] = $jmeno;
	header('Location: admin_menu.php');
	}

else if($pocet==1){
    session_start();
$_SESSION['jmeno']=$jmeno;
      header('Location: autori_menu.php');
        
    }
else if($pocet2==1){
    session_start();
$_SESSION['jmeno']=$jmeno;
      header('Location: recenzenti_menu.php');
        
    }
	else {
		header('Location: prihlaseni.php');
	}
		
?>
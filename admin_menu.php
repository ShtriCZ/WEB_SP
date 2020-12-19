<html>
<head>
<title></title>
<meta name="generator" content="Bluefish 2.2.9" >
<meta name="author" content="Student" >
<meta name="date" content="2018-05-30T11:22:42+0100" >
<meta name="copyright" content="">
<meta name="keywords" content="">
<meta name="description" content="">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<meta http-equiv="content-style-type" content="text/css">
<meta http-equiv="expires" content="0">
<link rel="stylesheet" href="styl.css" type="text/css">
</head>
<body>
<div class="prihlasen">
      <?php
       session_start();
       echo 'Jste přihlášen jako: <h10 >'.$_SESSION['jmeno'].'</h10>';
    
       ?>
    <br>
    <a href="odhlaseni.php" style="color: #00d408">Odhlásit se</a><br>
    </div>
<h1 style="position: fixed; top: -0.5%; left: 1%">WEB KONFERENCE</h1>
<center>
    <div class="aaa">
        <table cellspacing="5" border="0" cellpadding="0">
            <td style=" padding: 5px;"><a href="about.php">O STRÁNKÁCH</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="konference.php">KONFERENCE</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="sprava_konference.php">SPRÁVA KONFERENCÍ</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="uzivatele.php">UŽIVATELÉ</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="zverejnit_konferenci.php">ZVEŘEJNIT RECENZI</a></td>
        </table>
    </div>
    <br>
   <div class="login">
    Vítejte admine. Nyní můžete přidávat nové uživatele a spravovat konference.
    </div> 
</body>
</html>
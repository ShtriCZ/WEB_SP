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
            <td style=" padding: 5px;"><a href="recenzenti_menu.php">O STRÁNKÁCH</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="konference_recenzenti.php">KONFERENCE</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="konference_k_recenzi.php">KONFERENCE K RECENZI</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="ohodnotit.php">OHODNOTIT KONFERENCI</a></td>
        </table>
    </div>

 
    <br>
   <div class="login">

       <h2>Recenze:</h2>
       <table cellpadding="5px">
       <form method="POST" action="ulozit_recenzi.php">
           <tr><td>Konference: </td><td><select name="konference">
                       <?php
                       $servername="localhost";
                       $username="root";
                       $password="";
                       $dbname="web_sp";
                       $conn=mysqli_connect($servername,$username,$password,$dbname);
                       if ($conn->connect_error) {
                           die("Chyba: " . $conn->connect_error);
                       }
                       $jmeno = $_SESSION['jmeno'];
                       $prikaz = "SELECT * FROM konference";
                       $resul = $conn->query($prikaz);
                       if ($resul->num_rows > 0) {
                       // output data of each row
                       $prika = "SELECT id FROM recenzenti WHERE jmeno='$jmeno'";
                       $result = $conn->query($prika);
                       if ($result->num_rows > 0) {
                           // output data of each row

                           while($dat = $result->fetch_assoc()) {
                               $id=$dat["id"];
                           }
                       }
                       while($data = $resul->fetch_assoc()) {
                       $jmena = explode(",",$data["recenzent"]);
                       for($i =0;$i<count($jmena);$i++){
                       if($jmena[$i]==$id){
                               echo "<option value=" . $data["nazev"] . ">" . $data["nazev"] . "</option>";
                           }
                       }}}
                       ?>
               </td></tr>
           <tr><td>Originalita: </td><td><select name="originalita">
                       <option value="1">1 - velmi neoriginální</option>
                       <option value="2">2 - lehce originální</option>
                       <option value="3">3 - průměrně originální</option>
                       <option value="4">4 - celkem originální</option>
                       <option value="5">5 - velmi originální</option></td></tr>
           <tr><td>Téma: </td><td><select name="tema">
                   <option value="1">1 - úplně mimo</option>
                   <option value="2">2 - částečně správně</option>
                   <option value="3">3 - vcelku dobré</option>
                   <option value="4">4 - dobré</option>
                   <option value="5">5 - výborné</option></td></tr>
           <tr><td>Technická kvalita: </td><td><select name="technicka_kvalita">
                   <option value="1">1 - hrozná</option>
                   <option value="2">2 - dostačující</option>
                   <option value="3">3 - dobrá</option>
                   <option value="4">4 - velmi dobrá</option>
                   <option value="5">5 - výborná</option></td></tr>
           <tr><td>Jazyková kvalita: </td><td><select name="jazykova_kvalita">
                   <option value="1">1 - hrozná</option>
                   <option value="2">2 - dostačující</option>
                   <option value="3">3 - dobrá</option>
                   <option value="4">4 - velmi dobrá</option>
                   <option value="5">5 - výborná</option></td></tr>
           <tr><td>Doporučení: </td><td><select name="doporuceni">
                       <option value="1">1 - rozhodně nepřijmout</option>
                       <option value="2">2 - spíše nepřijmout</option>
                       <option value="3">3 - přijmout</option>
                       <option value="4">4 - spíše přijmout</option>
                       <option value="5">5 - rozhodně přijmout</option></td></tr>
           <tr><td style="position: relative; bottom:120px ">Poznámky: </td><td><textarea name="poznamky" style="width: 500px; height: 250px; resize: none"></textarea></td></tr>
           <tr><td><input type="submit" value="Odeslat"></td></tr>
       </form>
       </table>
</div>
    </body>
</html>
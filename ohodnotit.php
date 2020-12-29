<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<meta http-equiv="content-style-type" content="text/css">
    <title>Ohodnotit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="styl.css" type="text/css">
</head>
<body>
<!--Výpis uživatelského jména přihlášeného uživatele-->
<?php
session_start();
if(isset($_SESSION['jmeno'])){
    echo '
<div class="prihlasen">Jste přihlášen jako: <h10 >'.$_SESSION['jmeno'].'</h10>';
    echo '<br><a href="odhlaseni.php" style="color: #00d408">Odhlásit se</a><br>

</div>';}
else{
    header('Location: index.php');
}
?>

<!--Nadpis stránky s odkazem na úvodní stránku-->
<a href="index.php"><h1 style="position: fixed; top:1%; left: 1%">WEB KONFERENCE</h1></a>
<!--Menu s odkazy na další stránky-->
<center>
    <div class="aaa">
        <table cellspacing="5" border="0" cellpadding="0">
            <td style=" padding: 5px;"><a href="recenzenti_menu.php" class="text-success">O STRÁNKÁCH</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="konference_recenzenti.php" class="text-success">KONFERENCE</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="konference_k_recenzi.php" class="text-success">KONFERENCE K RECENZI</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="ohodnotit.php" class="text-success">OHODNOTIT KONFERENCI</a></td>
        </table>
    </div>
</center>
 
    <br>
   <div class="login">

       <h2>Recenze:</h2>
       <table cellpadding="5px">
           <!--Formulář pro odeslání recenze-->
            <form method="POST" action="ulozit_recenzi.php">
           <tr><td>Konference: </td><td><select name="konference">
                       <?php
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
                       if ($conn->connect_error) {
                           die("Chyba: " . $conn->connect_error);
                       }
                       $jmeno = $_SESSION['jmeno'];
                        //Vybrání všech dat z databáze konference
                       $prikaz = "SELECT * FROM konference";
                       $resul = $conn->query($prikaz);
                       if ($resul->num_rows > 0) {
                       //Vybere id z recenzentů podle uživatelského jména přihlášeného uživatele
                       $prika = "SELECT id FROM recenzenti WHERE uzjmeno='$jmeno'";
                       $result = $conn->query($prika);
                       if ($result->num_rows > 0) {
                           while($dat = $result->fetch_assoc()) {
                               $id=$dat["id"];
                        //Vypíše všechny recenze, které má k recenzi přihlášený uživatel
                       while($data = $resul->fetch_assoc()) {
                       $jmena = explode(",",$data["recenzent"]);
                       for($i =0;$i<count($jmena);$i++){
                       if($jmena[$i]==$id){
                               echo "<option value=" . $data["nazev"] . ">" . $data["nazev"] . "</option>";
                           }
                       }}} } }
                       ?>
               </td></tr>
                <!--Možnosti pro recenzi-->
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

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
<?php
session_start();
if(isset($_SESSION['jmeno'])){
    echo '
<div class="prihlasen">Jste přihlášen jako: <h10 >'.$_SESSION['jmeno'].'</h10>';
    echo '<br><a href="odhlaseni.php" style="color: #00d408">Odhlásit se</a><br>

</div>';}
else{
    echo '<div class="prihlaseni">
    <a href="prihlaseni.php">Přihlásit se</a><br>
</div>';
}
?>
<h1 style="position: fixed; top: -0.5%; left: 1%">WEB KONFERENCE</h1>
<center>
    <div class="aaa">
        <table cellspacing="5" border="0" cellpadding="0">
            <td></td>
            <td style=" padding: 5px;"><a href="about.php">O STRÁNKÁCH</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="konference.php">KONFERENCE</a></td>
            <?php
            if(isset($_SESSION['jmeno'])){
                if($_SESSION['jmeno']=="admin"){
                    echo('<td style="border-left: 1px solid darkgray; padding: 5px;"><a href="sprava_konference.php">SPRÁVA KONFERENCÍ</a></td>');
                    echo('<td style="border-left: 1px solid darkgray; padding: 5px;"><a href="uzivatele.php">UŽIVATELÉ</a></td>');
                    echo ('<td style="border-left: 1px solid darkgray; padding: 5px;"><a href="zverejnit_konferenci.php">ZVEŘEJNIT RECENZI</a></td>');
                }}
            ?>
        </table>
    </div>
    <br>
    <div class="login">
        <a class="btn" href="schvalit.php"></a>
        <?php
        $servername="localhost";
        $username="root";
        $password="";
        $dbname="web_sp";
        $conn=mysqli_connect($servername,$username,$password,$dbname);
        if ($conn->connect_error) {
            die("Chyba: " . $conn->connect_error);
        }


        $prikaz = "SELECT nazev FROM konference WHERE NOT 'schvaleno'";
        $resul = $conn->query($prikaz);
        echo "<br><table  cellspacing='10' border='1' style='text-align: center'>";
        if ($resul->num_rows > 0) {
            // output data of each row
            while($data = $resul->fetch_assoc()) {
                echo  "<tr><td width='1%'>".$data["nazev"]."</td><td width='1%'><form method='post' action='schvalit.php'><button type='submit' name='nazev' value='".$data["nazev"]."' >Schválit</button></form>  </td>
                        <td width='1%'><form action='neschvalit.php' method='post'><button type='submit' name='nazev' value='".$data["nazev"]."' >Neschválit</button></form> </td></tr>";

                $q=$data["nazev"];}}
        echo "</table>";
        ?>
    </div>


</body>
</html>
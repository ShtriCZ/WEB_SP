<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
    <meta http-equiv="content-style-type" content="text/css">
    <title>Konference</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="styl.css" type="text/css">
    <script type="text/javascript" src="ckeditor4/ckeditor/ckeditor.js" charset="utf-8"></script>
</head>
<body>
<!--zjištění uživatelského jména uživatele a jeho vypsání, pokud není uživatel přihlášen je vypsán odkaz pro přihlášení-->
<?php
session_start();
if(isset($_SESSION['jmeno'])){
    echo '
<div class="prihlasen">Jste přihlášen jako: <h10 >'.$_SESSION['jmeno'].'</h10>';
    echo '<br><a href="odhlaseni.php" style="color: #00d408">Odhlásit se</a><br>

</div>';}
else{
    echo '<div class="prihlaseni">
    <p class="text-success"><a href="prihlaseni.php" style="text-decoration: none;color:#007901;">Přihlásit se</a></p> <br>
</div>';
}
?>

<!--Nadpis stránky s odkazem na úvodní stránku-->
<a href="index.php"><h1 style="position: fixed; top:1%; left: 1%">WEB KONFERENCE</h1></a>
<!--Menu s odkazy na další stránky-->
<center>
    <div class="aaa">
        <table cellspacing="5" border="0" cellpadding="0">
            <?php
            if(isset($_SESSION['jmeno'])){
                $jmeno=$_SESSION['jmeno'];
                if($_SESSION['jmeno']=="admin"){
                    echo('<td style=" padding: 5px;"><a href="admin_menu.php" class="text-success">O STRÁNKÁCH</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="konference.php" class="text-success">KONFERENCE</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="sprava_konference.php" class="text-success">SPRÁVA KONFERENCÍ</a></td>
                        <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="uzivatele.php" class="text-success">UŽIVATELÉ</a></td>
                    <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="zverejnit_konferenci.php" class="text-success">ZVEŘEJNIT KONFERENCI</a></td>');
                }

                //Udáje od databáze, do které se chceme připojit
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "web_sp";
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                //Zajištění že se budou data načítat i v češtině
                $conn->query('set character_set_client=utf8');
                $conn->query('set character_set_connection=utf8');
                $conn->query('set character_set_results=utf8');
                $conn->query('set character_set_server=utf8');
                if ($conn->connect_error) {
                    die("Chyba: " . $conn->connect_error);
                }

                $prikaz = "SELECT * FROM autori WHERE uzjmeno='$jmeno'";
                $resul = $conn->query($prikaz);

                if ($resul->num_rows > 0) {
                    // output data of each row
                    while ($data = $resul->fetch_assoc()) {
                        echo ' <td style=" padding: 5px;"><a href="autori_menu.php" class="text-success">O STRÁNKÁCH</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="konference_autori.php" class="text-success">KONFERENCE</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="moje_konference.php" class="text-success">MOJE KONFERENCE</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="pridat_konferenci.php" class="text-success">PŘIDAT KONFERENCI</a></td>';
                    }
                }
                $prikaz = "SELECT * FROM recenzenti WHERE uzjmeno='$jmeno'";
                $resul = $conn->query($prikaz);

                if ($resul->num_rows > 0) {
                    // output data of each row
                    while ($data = $resul->fetch_assoc()) {
                        echo ' <td style=" padding: 5px;"><a href="recenzenti_menu.php" class="text-success">O STRÁNKÁCH</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="konference_recenzenti.php" class="text-success">KONFERENCE</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="konference_k_recenzi.php" class="text-success">KONFERENCE K RECENZI</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="ohodnotit.php" class="text-success">OHODNOTIT KONFERENCI</a></td>';
                    }
                }

            }
            else{
                echo('<td style=" padding: 5px;"><a href="about.php" class="text-success">O STRÁNKÁCH</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="konference.php" class="text-success">KONFERENCE</a></td>');
            }
            ?>
        </table>
    </div>
</center>
    <br>
    <div class="login">
        <?php
        $servername="localhost";
        $username="root";
        $password="";
        $dbname="web_sp";
        $conn=mysqli_connect($servername,$username,$password,$dbname);
        $conn->query('set character_set_client=utf8');
        $conn->query('set character_set_connection=utf8');
        $conn->query('set character_set_results=utf8');
        $conn->query('set character_set_server=utf8');
        if ($conn->connect_error) {
            die("Chyba: " . $conn->connect_error);
        }
        $id=htmlspecialchars($_POST['id']);

        $prikaz = "SELECT * FROM konference WHERE id='$id'";
        $resul = $conn->query($prikaz);

        if ($resul->num_rows > 0) {
            // output data of each row
            while($data = $resul->fetch_assoc()) {
        echo  "<h2>".$data["nazev"]."</h2><textarea readonly name='text' style='width: 500px; height: 250px; resize: none' class='ckeditor' id='editor'>".$data["text"] ."</textarea>
            <p class='text-success'><a style='text-decoration: none;color:#007901;' href='pdf/".$data["pdf"]."'>".$data["pdf"]."</a></p>";
}}
        ?>
    </div>
</body>
</html>

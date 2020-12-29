<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<meta http-equiv="content-style-type" content="text/css">
    <title>Konference k recenzi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="styl.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="ckeditor4/ckeditor/ckeditor.js" charset="utf-8"></script>
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


        <?php
        $jmeno = $_SESSION['jmeno'];
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
        //Chyba pokud neexistuje připojení k databázi
        if ($conn->connect_error) {
            die("Chyba: " . $conn->connect_error);
        }
        //Výběr všeho z databáze konferencí
        $prikaz = "SELECT * FROM konference";
        $resul = $conn->query($prikaz);
        if ($resul->num_rows > 0) {
            //Výběr id z recenzentů podle jména
        $prika = "SELECT id FROM recenzenti WHERE uzjmeno='$jmeno'";
        $result = $conn->query($prika);
        echo "<br><table  cellspacing='5' border='2'>";
        if ($result->num_rows > 0) {
        //Výpis horní řady tabulky
        echo("<tr><td>Název:</td><td>Autor:</td><td>Abstrakt:</td><td>Stav:</td><td>PDF:</td><td>Přidal:</td></tr>");
        while($dat = $result->fetch_assoc()) {
        $id=$dat["id"];
        //Výpis konferencí, které má přihlášený recenzent k recenzi
            while($data = $resul->fetch_assoc()) {
                $jmena = explode(",",$data["recenzent"]);
                for($i =0;$i<count($jmena);$i++){
                    if($jmena[$i]==$id){
                echo  "<tr><td width='1%'>".$data["nazev"]."</td><td width='1%'>".$data["autor"]."</td><td width='1%''><button>Ukázat</button></td>
                <td width='1%'>".$data["stav"]."</td><td width='1%'><p class='text-success'><a  style='text-decoration: none;color:#007901;' href='pdf/".$data["pdf"]."'>".$data["pdf"]."</a></p></td><td width='1%'>".$data["pridal"]."</td></tr>";
                        echo  "<tr><div id='text' style='display:none'><textarea readonly name='text' style='width: 500px; height: 250px; resize: none' class='ckeditor' id='editor'>".$data["text"] ."</textarea></div></tr>";
            }}}} }  }
        echo "</table>";
        ?>
    </div>
<!--Script pro zobrazení a skrytí abstraktu-->
    <script>
        $(document).ready(function(){
            $("button").click(function(){
                $("#text").toggle();
            });
        });
    </script>
<!--Script pro obarvení řádků v tabulce-->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script>
        $("tr:odd").addClass("barva").css("background-color","#151515");
    </script>
</body>
</html>

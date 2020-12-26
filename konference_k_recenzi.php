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
    <title>Konference k recenzi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="styl.css" type="text/css">
</head>
<body>
<div class="prihlasen">
    <?php
    session_start();
    $jmeno = $_SESSION['jmeno'];
    echo 'Jste přihlášen jako: <h10 >'.$jmeno.'</h10>';

    ?>
    <br>
    <a href="odhlaseni.php" style="color: #00d408">Odhlásit se</a><br>
</div>
<h1 style="position: fixed; top:1%; left: 1%">WEB KONFERENCE</h1>
<center>
    <div class="aaa">
        <table cellspacing="5" border="0" cellpadding="0">
            <td style=" padding: 5px;"><a href="recenzenti_menu.php" class="text-success">O STRÁNKÁCH</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="konference_recenzenti.php" class="text-success">KONFERENCE</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="konference_k_recenzi.php" class="text-success">KONFERENCE K RECENZI</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="ohodnotit.php" class="text-success">OHODNOTIT KONFERENCI</a></td>
        </table>
    </div>
    <br>
    <div class="login">


        <?php
        $servername="localhost";
        $username="root";
        $password="";
        $dbname="web_sp";
        $conn=mysqli_connect($servername,$username,$password,$dbname);
        if ($conn->connect_error) {
            die("Chyba: " . $conn->connect_error);
        }
        $prikaz = "SELECT * FROM konference";
        $resul = $conn->query($prikaz);
        if ($resul->num_rows > 0) {
            // output data of each row
        $prika = "SELECT id FROM recenzenti WHERE jmeno='$jmeno'";
        $result = $conn->query($prika);
        echo "<br><table  cellspacing='5' border='2'>";
        if ($result->num_rows > 0) {
        // output data of each row
        echo("<tr><td>Název:</td><td>Originalita:</td><td>Téma:</td><td>Technická kvalita:</td><td>Jazyková kvalita:</td><td>Stav:</td></tr>");
        while($dat = $result->fetch_assoc()) {
        $id=$dat["id"];
        }
        }
            while($data = $resul->fetch_assoc()) {
                $jmena = explode(",",$data["recenzent"]);
                for($i =0;$i<count($jmena);$i++){
                    if($jmena[$i]==$id){
                echo  "<tr><form action='ohodnotit.php' method='post'><input type='hidden' name='nazev' value=".$data["nazev"]."><td width='1%'>".$data["nazev"]."</td><td width='1%'>".$data["originalita"]."</td><td width='1%'>".$data["tema"]."</td>
                <td width='1%'>".$data["technicka_kvalita"]."</td><td width='1%'>".$data["jazykova_kvalita"]."</td><td width='1%'>".$data["stav"]."</td></tr>";
            }}}}
        echo "</form></table>";
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script>
        $("tr:odd").addClass("barva").css("background-color","#151515");
    </script>
</body>
</html>
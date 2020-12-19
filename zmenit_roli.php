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
<h1 style="position: absolute; top: -0.5%; left: 1%">WEB KONFERENCE</h1>
<center>
    <div class="aaa">
        <table cellspacing="5" border="0" cellpadding="0">
            <td></td>
            <td style=" padding: 5px;"><a href="about.php">O STRÁNKÁCH</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="konference.php">KONFERENCE</a></td>
                    <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="sprava_konference.php">SPRÁVA KONFERENCÍ</a></td>
                    <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="uzivatele.php">UŽIVATELÉ</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="zverejnit_konferenci.php">ZVEŘEJNIT RECENZI</a></td>
        </table>
    </div>
    <br>
    <div class="login">
        <?php
        include_once("connect.php");
        $uzjmeno=htmlspecialchars($_POST['uzjmeno']);
        if(isset($_POST['role'])){
        $role=htmlspecialchars($_POST['role']);

        if ($conn->connect_error) {
            die("Chyba: " . $conn->connect_error);
        }

        if($role=="Změnit roli autora"){
            $prikaz = "SELECT * FROM autori WHERE uzjmeno='$uzjmeno'";
            $resul = $conn->query($prikaz);
            echo "<br><table  cellspacing='5' border='2'>";
            if ($resul->num_rows > 0) {
                // output data of each row
                while($data = $resul->fetch_assoc()) {

                    $jmeno = $data["jmeno"];
                    $prijmeni = $data["prijmeni"];
                    $email = $data["email"];
                    $uzjmeno = $data["uzjmeno"];
                    $heslo = $data["heslo"];
        $sql = "INSERT INTO `recenzenti` (jmeno, prijmeni, email, uzjmeno, heslo)
    VALUES ('$jmeno', '$prijmeni', '$email', '$uzjmeno', '$heslo')";
        if ($conn->query($sql) === TRUE) {

        } else {
            echo "Chyba: " . $sql . "<br>" . $conn->error;}}
            }
        $sql = " DELETE FROM `autori` WHERE uzjmeno='$uzjmeno'";
        if ($conn->query($sql) === TRUE) {
            echo "Vytvořen nový záznam:";
        } else {
            echo "Chyba: " . $sql . "<br>" . $conn->error;

            $conn->close();}}


        else if($role=="Změnit roli recenzenta"){
            $prikaz = "SELECT * FROM recenzenti WHERE uzjmeno='$uzjmeno'";
            $resul = $conn->query($prikaz);
            echo "<br><table  cellspacing='5' border='2'>";
            if ($resul->num_rows > 0) {
                // output data of each row
                while($data = $resul->fetch_assoc()) {

                    $jmeno = $data["jmeno"];
                    $prijmeni = $data["prijmeni"];
                    $email = $data["email"];
                    $uzjmeno = $data["uzjmeno"];
                    $heslo = $data["heslo"];
                    $sql = "INSERT INTO `autori` (jmeno, prijmeni, email, uzjmeno, heslo)
    VALUES ('$jmeno', '$prijmeni', '$email', '$uzjmeno', '$heslo')";
                    if ($conn->query($sql) === TRUE) {

                    } else {
                        echo "Chyba: " . $sql . "<br>" . $conn->error;}}
            }
            $sql = " DELETE FROM `recenzenti` WHERE uzjmeno='$uzjmeno'";
            if ($conn->query($sql) === TRUE) {
                echo "Vytvořen nový záznam:";
            } else {
                echo "Chyba: " . $sql . "<br>" . $conn->error;

                $conn->close();}}}

        if(isset($_POST['odstranit'])){
            $odstranit=htmlspecialchars($_POST['odstranit']);
        if($odstranit=="Odstranit autora"){

        $sql = " DELETE FROM `autori` WHERE uzjmeno='$uzjmeno'";
        if ($conn->query($sql) === TRUE) {
            echo "Vytvořen nový záznam:";
        } else {
            echo "Chyba: " . $sql . "<br>" . $conn->error;

            $conn->close();}}


        else if($odstranit=="Odstranit recenzenta"){

            $sql = " DELETE FROM `recenzenti` WHERE uzjmeno='$uzjmeno'";
            if ($conn->query($sql) === TRUE) {
                echo "Vytvořen nový záznam:";
            } else {
                echo "Chyba: " . $sql . "<br>" . $conn->error;

                $conn->close();}}
        }

        ?>
       </div>
</body>
</html>
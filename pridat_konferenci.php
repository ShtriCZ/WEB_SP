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
            <td style=" padding: 5px;"><a href="autori_menu.php">O STRÁNKÁCH</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="konference_autori.php">KONFERENCE</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="moje_konference.php">MOJE KONFERENCE</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="pridat_konferenci.php">PŘIDAT KONFERENCI</a></td>
        </table>
    </div>
    <br>
    <div class="login">
        <h2>Vkládání nové konference:</h2>
        <table cellpadding="5px">
            <form method="POST" action="ulozit_konferenci.php">
                <tr><td>Nazev: </td><td><input type="text" name="nazev" ></td></tr>
                <tr><td> Autoři: </td><td><input type="text" name="autor"></td></tr>
                <tr><td style="position: relative; bottom:120px "> Text: </td><td><textarea name="text" style="width: 500px; height: 250px; resize: none"></textarea></td></tr>
                <tr><td> PDF: </td><td><input type="file" name="pdf" accept="application/pdf"></td></tr>
                <tr><td><input type="submit" value="Odeslat"></td></tr>
            </form>
        </table>
    </div>
</body>
</html>
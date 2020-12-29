<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<meta http-equiv="content-style-type" content="text/css">
    <title>Přihlášení</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="styl.css" type="text/css">
</head>
<body>
    <!--Odkaz pro přihlášení-->
<div class="prihlaseni">
    <a href="prihlaseni.php" style="text-decoration: none;color:#007901;">Přihlásit se</a><br>
    </div>

<!--Nadpis stránky s odkazem na úvodní stránku-->
<a href="index.php"><h1 style="position: fixed; top:1%; left: 1%">WEB KONFERENCE</h1></a>
<!--Menu s odkazy na další stránky-->
<center>
    <div class="aaa">
        <table cellspacing="5" border="0" cellpadding="0">
            <td></td>
            <td style=" padding: 5px;"><a href="about.php" class="text-success">O STRÁNKÁCH</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;" ><a href="konference.php" class="text-success">KONFERENCE</a></td>
        </table>
    </div>
</center>
    <div class="abc">
        <table cellpadding="5px">
            <!--Formulář pro přihlášení-->
            <form method="POST" action="login.php">
                <tr><td>Uživatelské jméno:</td> <td><input type="text" name="jmeno" placeholder="Uživatelské jméno"></td></tr>
                <tr><td>Heslo: </td><td><input type="password" name="heslo" placeholder="Heslo"></td></tr>
                <td><button type="submit" class="btn btn-light">Přihlásit</button></td>

            </form>
       </table>
        //Odkaz pokud chce uživatel vytvořit nový účet-->
        <a href="pridat_uzivatele.php" style="color: #00d408">Vytvořit účet.</a>
    </div>
</body>
</html>

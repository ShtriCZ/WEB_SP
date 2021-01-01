<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
    <meta http-equiv="content-style-type" content="text/css">
    <title>Přidat konferenci</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="styl.css" type="text/css">
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
            <td style=" padding: 5px;"><a href="autori_menu.php" class="text-success">O STRÁNKÁCH</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="konference.php" class="text-success">KONFERENCE</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="moje_konference.php" class="text-success">MOJE KONFERENCE</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="pridat_konferenci.php" class="text-success">PŘIDAT KONFERENCI</a></td>
        </table>
    </div>
</center>
<br>
<div class="login">
    <h2>Vkládání nové konference:</h2>
    <table cellpadding="5px">
        <!--Formulář pro vytvoření nové konference-->
        <form method="POST" action="ulozit_konferenci.php">
            <tr><td>Název: </td><td><input type="text" name="nazev" ></td></tr>
            <tr><td> Autoři: </td><td><input type="text" name="autor"></td></tr>
            <tr><td style="position: relative; bottom: 120px; "> Abstrakt: </td><td><textarea name="text" style="width: 500px; height: 250px; resize: none" class="ckeditor" id="editor"></textarea></td></tr>
            <tr><td> PDF: </td><td><input type="file" name="pdf" accept="application/pdf"></td></tr>
            <tr><td><input type="submit" value="Odeslat"></td></tr>
        </form>
    </table>
</div>
<!--Skript pro CKEditor-->
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
</body>
</html>

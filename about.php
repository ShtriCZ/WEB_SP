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
    <title>O stránkách</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
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
    <a href="prihlaseni.php" style="text-decoration: none;color:#007901;">Přihlásit se</a><br>
</div>';
}
?>

<h1 style="position: fixed; top:1%; left: 1%">WEB KONFERENCE</h1>
<center>
    <div class="aaa">
        <table cellspacing="5" border="0" cellpadding="0">
            <td></td>
            <td style=" padding: 5px;"><a href="about.php" class="text-success">O STRÁNKÁCH</a></td>
            <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="konference.php" class="text-success">KONFERENCE</a></td>
            <?php
            if(isset($_SESSION['jmeno'])){
            if($_SESSION['jmeno']=="admin"){
                echo('<td style="border-left: 1px solid darkgray; padding: 5px;"><a href="sprava_konference.php" class="text-success">SPRÁVA KONFERENCÍ</a></td>');
                echo('<td style="border-left: 1px solid darkgray; padding: 5px;"><a href="uzivatele.php" class="text-success">UŽIVATELÉ</a></td>');
                echo ('<td style="border-left: 1px solid darkgray; padding: 5px;"><a href="zverejnit_konferenci.php" class="text-success">ZVEŘEJNIT RECENZI</a></td>');
            }}
            ?>
        </table>
    </div>
    <br>
    <div class="login">
    Vítejte na stránkách konference.<br><br>
        V záložce konference si můžete prohlédnout veškeré přidané konference. Po přihlášení jako uživatel můžete přidávat nové konference.
        Po přihlášení jako recenzent můžete konference hodnotit. Dobře hodnocené konference mohou být přidány, pokud je admin schválí.
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
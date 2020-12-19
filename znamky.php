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
       echo 'Jste přihlášen jako: <h10 style="color:blue;">'.$_SESSION['jmeno'].'</h10>';
       ?>
    <br>
    <a href="odhlaseni.php" style="color:blue">Odhlásit se</a>
    </div>
<h1 style="color: darkblue;font-size:250%; margin-left: 30%;" >Online testování studentů</h1>
<div class="aaa">
    <table cellspacing="5" border="0" cellpadding="0">
        <td><a href="aj2.php">Anglický jazyk</a></td>
        <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="cj2.php">Český jazyk</a></td>
        <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="lit2.php">Literatura</a></td>
    <?php
        
    if($_SESSION['jmeno']=="admin"){
echo '<td style="border-left: 1px solid darkgray; padding: 5px;"><a href="vkladani_ucitelu.php">Přidat učitele</a></td>';
    }
    ?>
    
        <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="vytvoreni_tridy.php">Vytvořit třídu</a></td>
        <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="vytvoreni_testu.php">Vytvořit test</a></td>
        <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="studenti.php">Studenti</a></td>
        <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="ucitele.php">Učitelé</a></td>
        <td style="border-left: 1px solid darkgray; padding: 5px;"><a href="znamky.php">Známky</a></td>
    </table>
</div>

    <br>
<div class="login">
   <?php
 $servername="localhost";
$username="root";
$password="";
$dbname="maturita";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if ($conn->connect_error) {
    die("Chyba: " . $conn->connect_error);
} 
    
        $lul = "SELECT trida FROM studenti GROUP BY trida";
$resul = $conn->query($lul);

if ($resul->num_rows > 0) {
    // output data of each row
    while($abc = $resul->fetch_assoc()) {
        echo  $abc["trida"];


    
 
    $q=$abc["trida"];
$sql = "SELECT * FROM `studenti` WHERE trida = '$q'";
$result = $conn->query($sql);
  
	echo "<br><table  cellspacing='0' border='1'>";
 
        
    $lul = "SELECT jmeno FROM znamky GROUP BY jmeno";
$resul = $conn->query($lul);

if ($resul->num_rows > 0) {
    while($abc = $resul->fetch_assoc()) {
     


    
 
    $jmeno=$abc["jmeno"];
$sql = "SELECT * FROM `znamky` WHERE jmeno = '$jmeno'";
$result = $conn->query($sql);

        
        echo "<tr><td> Jméno:</td><td>Anglický jazyk:</td><td>Český jazyk:</td><td>Literatura:</td>";
if ($result->num_rows > 0) {
        echo "<tr><td>" . $jmeno. "</td>"; 
    
}  
    $sql = "SELECT * FROM `znamky` WHERE jmeno = '$jmeno' AND predmet = 'aj'";
$result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $i=1;
        echo "<td>";
    while($row = $result->fetch_assoc()) {
        if($result->num_rows>$i){
           $i++;
        echo $row["znamka"] . ", "; 
             
        }
        else{
            echo $row["znamka"];
        }
    } 
        echo"</td>";
    }
            $sql = "SELECT * FROM `znamky` WHERE jmeno = '$jmeno' AND predmet = 'cj'";
$result = $conn->query($sql);
        echo "<td>";
   if ($result->num_rows > 0) {
        $i=1;
        echo "<td>";
    while($row = $result->fetch_assoc()) {
        if($result->num_rows>$i){
           $i++;
        echo $row["znamka"] . ", "; 
             
        }
        else{
            echo $row["znamka"];
        }
    } 
        echo"</td>";
    }
            $sql = "SELECT * FROM `znamky` WHERE jmeno = '$jmeno' AND predmet = 'lit'";
$result = $conn->query($sql);
         echo "<td>";
  if ($result->num_rows > 0) {
        $i=1;
        echo "<td>";
    while($row = $result->fetch_assoc()) {
        if($result->num_rows>$i){
           $i++;
        echo $row["znamka"] . ", "; 
             
        }
        else{
            echo $row["znamka"];
        }
    } 
        echo"</td>";
    }
    echo "	</table><br>";
} 
  
   } else {
    echo "Žádné záznamy.";
}}}
$conn->close();
?>
</div>
    </body>
</html>

    
    
    
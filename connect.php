<?php $servername="localhost";
$username="root";
$password="";
$dbname="WEB_SP";
$conn=mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn){ die("chyba " . mysqli_connect_error());
} 
$autori = "CREATE TABLE IF NOT EXISTS `autori`(
id					int (5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
jmeno		      	varchar(40), 
prijmeni			varchar(40),
email               varchar(40),
uzjmeno             varchar(40) NOT NULL,
heslo               varchar(40) NOT NULL,
datum_vlozeni   	TIMESTAMP)
ENGINE=MyISAM DEFAULT CHARSET=utf8
COLLATE = utf8_czech_ci";
if(mysqli_query($conn, $autori)){  }
else { 	echo "chyba" . mysqli_error($conn); } 

    if(!$conn){ die("chyba " . mysqli_connect_error());
}
$recenzenti = "CREATE TABLE IF NOT EXISTS `recenzenti`(
id					int (5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
jmeno		      	varchar(40), 
prijmeni			varchar(40),
email               varchar(40),
uzjmeno             varchar(40),
heslo               varchar(40),
datum_vlozeni   	TIMESTAMP)
ENGINE=MyISAM DEFAULT CHARSET=utf8
COLLATE = utf8_czech_ci";
if(mysqli_query($conn, $recenzenti)){  }
else { 	echo "chyba" . mysqli_error($conn); }

if(!$conn){ die("chyba " . mysqli_connect_error());
}

$konference = "CREATE TABLE IF NOT EXISTS `konference`(
id					int (5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
nazev		      	varchar(40),
autor		    	varchar(100),
text                text(500),
stav                varchar(40),
pdf                 varchar(40),
pridal              varchar(40),
recenzent           varchar(40),
originalita         varchar(40),
tema                varchar(40),
technicka_kvalita   varchar(40),
jazykova_kvalita    varchar(40),
doporuceni          varchar(40),
poznamky            text(500),
datum_vlozeni   	TIMESTAMP)
ENGINE=MyISAM DEFAULT CHARSET=utf8
COLLATE = utf8_czech_ci";
if(mysqli_query($conn, $konference)){  }
else { 	echo "chyba" . mysqli_error($conn); }

if(!$conn){ die("chyba " . mysqli_connect_error());
}
?>
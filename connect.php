<?php $servername="localhost";
$username="root";
$password="";
$dbname="WEB_SP";
$conn=mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn){ die("chyba " . mysqli_connect_error());
}
$conn->query('set character_set_client=utf8');
$conn->query('set character_set_connection=utf8');
$conn->query('set character_set_results=utf8');
$conn->query('set character_set_server=utf8');
$autori = "CREATE TABLE IF NOT EXISTS `autori`(
id					int (5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
jmeno		      	varchar(40) NOT NULL, 
prijmeni			varchar(40) NOT NULL,
email               varchar(40) NOT NULL,
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
jmeno		      	varchar(40) NOT NULL, 
prijmeni			varchar(40) NOT NULL,
email               varchar(40) NOT NULL,
uzjmeno             varchar(40) NOT NULL,
heslo               varchar(40) NOT NULL,
datum_vlozeni   	TIMESTAMP)
ENGINE=MyISAM DEFAULT CHARSET=utf8
COLLATE = utf8_czech_ci";
if(mysqli_query($conn, $recenzenti)){  }
else { 	echo "chyba" . mysqli_error($conn); }

if(!$conn){ die("chyba " . mysqli_connect_error());
}

$konference = "CREATE TABLE IF NOT EXISTS `konference`(
id					int (5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
nazev		      	varchar(40) NOT NULL,
autor		    	varchar(100) NOT NULL,
text                text(500) NOT NULL,
stav                varchar(40),
pdf                 varchar (40),
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
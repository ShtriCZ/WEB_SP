<?php
//// Pripojeni k databazi ////

/** Adresa serveru. */
define("DB_SERVER","localhost");
/** Nazev databaze. */
define("DB_NAME","web_sp");
/** Uzivatel databaze. */
define("DB_USER","root");
/** Heslo uzivatele databaze */
define("DB_PASS","");


//// Nazvy tabulek v DB ////

/** Tabulka autori. */
define("TABLE_AUTORI", "autori");
/** Tabulka konference. */
define("TABLE_KONFERENCE", "konference");
/** Tabulka recenzenti. */
define("TABLE_RECENZENTI", "recenzenti");

//// Dostupne stranky webu ////

/** Adresar kontroleru. */
const DIRECTORY_CONTROLLERS = "app\Controllers";
/** Adresar modelu. */
const DIRECTORY_MODELS = "app\Models";
/** Adresar sablon */
const DIRECTORY_VIEWS = "app\Views";

/** Klic defaultni webove stranky. */
const DEFAULT_WEB_PAGE_KEY = "uvod";

/** Dostupne webove stranky. */
const ADMIN_PAGES = array(
    //// Uvodni stranka ////
    "uvod" => array(
        "title" => "Úvodní stránka",

        //// kontroler
        "file_name" => "IntroductionController.class.php",
        "class_name" => "IntroductionController",
    ),
    //// KONEC: Uvodni stranka ////

    //// Konference ////
    "konference" => array(
        "title" => "Konference",

        //// kontroler
        "file_name" => "KonferenceController.class.php",
        "class_name" => "KonferenceController",
    ),
    //// KONEC: Konference ////

    //// Sprava uzivatelu ////
    "sprava" => array(
        "title" => "Správa konferencí",

        //// kontroler
        "file_name" => "SpravaController.class.php",
        "class_name" => "SpravaController",
    ),
    //// KONEC: Sprava uzivatelu ////

    //// Uzivatele ////
    "uzivatele" => array(
        "title" => "Uživatelé",

        //// kontroler
        "file_name" => "UzivateleController.class.php",
        "class_name" => "UzivateleController",
    ),
    //// KONEC: Uzivatele ////

    //// Zverejnit konferenci ////
    "zverejnit" => array(
        "title" => "Zveřejnit konferenci",

        //// kontroler
        "file_name" => "ZverejnitController.class.php",
        "class_name" => "ZverejnitController",
    ),
    //// KONEC: Zverejnit konferenci ////
);

?>

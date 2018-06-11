<?php
/*
 *  @autor Michael Abplanalp
 *  @version März 2018
 *  Dieses Modul definert alle Konfigurationsparameter und stellt die DB-Verbindung her
 */

    // Inhalt des Menus
    setValue("cfg_menu_private_list", array("logout"=>"Logout","zeigeMeineGalerien"=>"Meine Galerien", "galerieErstellen" =>"Fotogalerie erstellen" ));

    // Funktionen
    setValue("cfg_func_list", array("login","registration", "logout"
    ,"zeigeMeineGalerien", "galerieErstellen", "galerieBearbeiten", "galerieLoeschen", "bilderHochladen", "loescheBild"));
    // Inhalt des Menus
    setValue("cfg_menu_list", array("login"=>"Login","registration"=>"Registration"));


// Datenbankverbindung herstellen
$db = mysqli_connect("127.0.0.1", "root", "gibbiX12345", "bilderdb");
if (!$db) die("Verbindungsfehler: ".mysqli_connect_error());
setValue("cfg_db", $db);
?>

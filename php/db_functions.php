<?php
/*
 *  @autor Michael Abplanalp
 *  @version Februar 2018
 *  Dieses Modul beinhaltet sämtliche Datenbankfunktionen.
 *  Die Funktionen formulieren die SQL-Anweisungen und rufen dann die Funktionen
 *  sqlQuery() und sqlSelect() aus dem Modul basic_functions.php auf.
 */

function db_insert_benutzer($newBenutzer){
    $sql = "insert into benutzer (nickName, email, passwort)
            VALUES ('".escapeSpecialChars($newBenutzer['nickname'])."',
            '".escapeSpecialChars($newBenutzer['email'])."',
            '".escapeSpecialChars($newBenutzer['passwort'])."')";
    sqlQuery($sql);
}
?>
<?php
/*
 *  @autor Michael Abplanalp
 *  @version Februar 2018
 *  Dieses Modul beinhaltet sämtliche Datenbankfunktionen.
 *  Die Funktionen formulieren die SQL-Anweisungen und rufen dann die Funktionen
 *  sqlQuery() und sqlSelect() aus dem Modul basic_functions.php auf.
 */

function db_insert_benutzer($newBenutzer){

        $sql = "insert into benutzer (email, passwort, nickname)
            VALUES ('".$newBenutzer['regi_email']."',
            '".md5($newBenutzer['regi_passwort'])."',
            '".$newBenutzer['regi_nickname']."')";

    sqlQuery($sql);
}

function db_select_user($email, $passwort){

    $result = "SELECT bid FROM benutzer WHERE email='".$email."' AND passwort='".md5($passwort)."' LIMIT 1";
    return sqlSelect($result);


}

function getUserNickname($email) {

    $result = "SELECT nickname FROM benutzer WHERE email=".$email;

    return sqlSelect($result);
}



?>
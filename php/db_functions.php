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

    $result = "SELECT nickname FROM benutzer WHERE email='.$email.'";

    return sqlSelect($result);
}

function db_SelectAllEmails($regiEmail){

    $result = "SELECT email FROM benutzer WHERE email ='.$regiEmail.'";
    print_r($result);
    return sqlSelect($result);
}

function db_insertGalerie($newGalerie){
    $loggedInUser = getUserIdFromSession();

    $sql = "insert into galerie (name, beschreibung, fk_bid)
            VALUES ('".$newGalerie['galerieName']."',
            '".$newGalerie['galerieBeschreibung']."',
            '".$loggedInUser[0]['bid']."')";

    sqlQuery($sql);
}

function db_getAllGalerie($userid){

    $result = "SELECT * FROM galerie WHERE fk_bid = $userid";
    return sqlSelect($result);
}

function db_getGalerie($gid){

    $result = "SELECT * FROM galerie WHERE gid = $gid";
    return sqlSelect($result);
}

function db_updateGalerie($galerie){

$gid = $_GET['gid'];

    $sql = "Update galerie 
            Set name = '".$galerie['galerieName']."',
             beschreibung = '".$galerie['galerieBeschreibung']."'
             Where gid=$gid";

    sqlQuery($sql);
}

function db_deleteGalerie(){
    $gid = $_GET['gid'];
    $sql = "DELETE FROM galerie WHERE gid=$gid";

    sqlQuery($sql);
}

?>
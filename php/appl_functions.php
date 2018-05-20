<?php
/*
 *  @autor Michael Abplanalp
 *  @version März 2018
 *  Dieses Modul beinhaltet Funktionen, welche die Anwendungslogik implementieren.
 */

/*
 * Beinhaltet die Anwendungslogik zum Login
 */
function login()
{
    // Template abfüllen und Resultat zurückgeben
    setValue("phpmodule", $_SERVER['PHP_SELF'] . "?id=" . getValue("func"));

    if (isset($_POST['email'])) {
        print_r($_POST['email']);
        $email = $_POST['email'];
        $passwort = $_POST['passwort'];

        $user = db_select_user($email, $passwort);

        if ($user == 0) {
            $message = "Falsche Anmeldedaten";
            setValue("LoginError", $message);
        } else {
            $_SESSION['bid'] = $user;
            setValue("LoginError", "");
            return runTemplate("../templates/member-bereich.htm.php");
        }
    }

    return runTemplate("../templates/" . getValue("func") . ".htm.php");
}

/*
 * Beinhaltet die Anwendungslogik zur Registration
 */
function registration()
{

    setValue("phpmodule", $_SERVER['PHP_SELF'] . "?id=" . getValue("func"));
    if (isset($_POST['regi_email']) || isset($_POST['regi_passwort'])) {
        $passwort = $_POST['regi_passwort'];
        $passwort2 = $_POST['regi_passwort2'];
        if (db_SelectAllEmails($_POST['regi_email']) == ""){
            $meldung = 'Email bereits vergeben';
            setValue("RegiError", $meldung);
        }
        if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,}$/', $_POST['regi_passwort'])) {
            $meldung = 'Der passwort entspricht nicht and die Richtlinien!';
            setValue("RegiError", $meldung);
        }else if ($passwort == $passwort2) {
            setValue("RegiError", "");
            db_insert_benutzer($_POST);
            header("Location: index.php");
        }else{
            $meldung = 'Passwörter waren nicht identisch';
            setValue("RegiError", $meldung);
        }
    } else {
        $meldung = 'Die * markierte Felder sind Erforderlich';
        setValue("RegiError", $meldung);
    }

    return runTemplate("../templates/" . getValue("func") . ".htm.php");
}

function logout()
{
    session_destroy();


    header("Location: index.php");
}
function zeigeMeineGalerien(){

    return runTemplate("../templates/member-bereich.htm.php");
}

function galerieErstellen(){
    setValue("phpmodule", $_SERVER['PHP_SELF'] . "?id=" . getValue("func"));
    if (isset($_POST['galerieName'])){
        db_insertGalerie($_POST);
        return zeigeMeineGalerien();
    }else{
        $meldung = 'Die * markierte Felder sind Erforderlich';
        setValue("RegiError", $meldung);
    }

    return runTemplate("../templates/" . getValue("func") . ".htm.php");
}

function galerieBearbeiten(){
    setValue("phpmodule", $_SERVER['PHP_SELF'] . "?id=" . getValue("func"));
    if (isset($_POST['galerieName'])){
        db_updateGalerie($_POST);
        return runTemplate("../templates/member-bereich.htm.php");
    }else{
        $meldung = 'Die * markierte Felder sind Erforderlich';
        setValue("RegiError", $meldung);
    }
    return runTemplate("../templates/" . getValue("func") . ".htm.php");
}

function galerieLoeschen(){
    db_deleteGalerie();

    return zeigeMeineGalerien();
}

function zeigeMeineBilder(){
    setValue("phpmodule", $_SERVER['PHP_SELF'] . "?id=" . getValue("func"));

    return runTemplate("../templates/" . getValue("func") . ".htm.php");
}
?>
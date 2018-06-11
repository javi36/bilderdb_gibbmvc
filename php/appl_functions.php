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
            return zeigeMeineGalerien();
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
        $path = 'C:/xampp/htdocs/m151/bilderdb_gibbmvc/uploadedImages/'.getUserIdFromSession()[0]['bid'].$_POST['galerieName'];
        mkdir($path);
        mkdir($path.'/thumbnail');

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
    loeschen(getGaleriePfad());
    db_deleteGalerie();
    return zeigeMeineGalerien();
}

function bilderHochladen(){
    if (isset($_FILES['bild']) && isset($_POST)) {
            $bildPfad = uploadImage();
            $pfad = getGaleriePfad() . '/';

            $fileName = time() + rand(1, 100);
            $fileExtension = getBildExtension($_FILES['bild']['type']);

            $output = $pfad . 'thumbnail/' . $fileName . $fileExtension;
            $dest = make_thumb($bildPfad, $output, 250);

            db_insertBild($_POST['bildername'], $bildPfad, $fileName . $fileExtension, $dest);
    }


    return runTemplate("../templates/zeigeMeineBilder.htm.php");
}

function loescheBild(){
    $image = db_getBildBy($_GET['bilderID']);

   // unlink($image[0]['bildPfad']);
   // unlink($image[0]['thumbnailPfad']);
    db_deleteBild($_GET['bilderID']);

    return zeigeMeineGalerien();
}
?>
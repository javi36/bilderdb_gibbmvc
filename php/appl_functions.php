<?php
/*
 *  @autor Michael Abplanalp
 *  @version März 2018
 *  Dieses Modul beinhaltet Funktionen, welche die Anwendungslogik implementieren.
 */

$meldung = '';
/*
 * Beinhaltet die Anwendungslogik zum Login
 */
function login() {
  // Template abfüllen und Resultat zurückgeben
  setValue("phpmodule", $_SERVER['PHP_SELF']."?id=".getValue("func"));

    if (isset($_POST['email'])) {

        $email = $_POST['email'];
        $passwort = $_POST['passwort'];

        $user = db_select_user($email, $passwort);

        if ($user == 0) {
            $message = "Falsche Anmeldedaten";
            setValue("LoginError", $message);
        } else {
            $_SESSION['bid'] = $user;
            setValue("LoginError", "");
        }
    }

    return runTemplate( "../templates/".getValue("func").".htm.php" );
}

/*
 * Beinhaltet die Anwendungslogik zur Registration
 */
function registration() {
    setValue("phpmodule", $_SERVER['PHP_SELF']."?id=".getValue("func"));

    if (isset($_POST['regi_email']) | $_POST['regi_passwort']){
        $passwort = $_POST['regi_passwort'];
        $passwort2 = $_POST['regi_passwort2'];
        if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,}$/', $_POST['regi_passwort'])) {
            $meldung = 'Der passwort entspricht nicht and die Richtlinien!';

        }else if ($passwort == $passwort2) {
            db_insert_benutzer($_POST);
            return runTemplate( "../templates/index.htm.php" );
        }

    }else{
        $meldung = 'Formulardaten fehlen';
    }

   return runTemplate( "../templates/".getValue("func").".htm.php" );
}

function logout() {
    session_destroy();


    header("Location: index.php");
}

?>
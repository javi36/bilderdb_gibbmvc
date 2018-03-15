<?php
/*
 *  @autor Michael Abplanalp
 *  @version März 2018
 *  Dieses Modul beinhaltet Funktionen, welche die Anwendungslogik implementieren.
 */
$meldung = "";
$email = "";
$passwort = "";
/*
 * Beinhaltet die Anwendungslogik zum Login
 */
function login() {
  // Template abfüllen und Resultat zurückgeben
  setValue("phpmodule", $_SERVER['PHP_SELF']."?id=".getValue("func"));



   /* if (isset($_POST['form-username'])) {
        $email = $_POST['form-username'];
        $passwort = $_POST['form-password'];

        $user = getUserIdFromDb($email, $passwort);

        if ($user == 0) {
            $meldung = "Falscher Benutzername oder Passwort";
        } else {
            $_SESSION['uid'] = $user;
            header('Location: index.php?function=entries_private');
        }
    }*/

    return runTemplate( "../templates/".getValue("func").".htm.php" );
}

/*
 * Beinhaltet die Anwendungslogik zur Registration
 */
function registration() {
    setValue("phpmodule", $_SERVER['PHP_SELF']."?id=".getValue("func"));

    if (isset($_POST['email'])){

        db_insert_benutzer($_POST);
    }

    return runTemplate( "../templates/".getValue("func").".htm.php" );
}
?>
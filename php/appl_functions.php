<?php
/*
 *  @autor Michael Abplanalp
 *  @version März 2018
 *  Dieses Modul beinhaltet Funktionen, welche die Anwendungslogik implementieren.
 */


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
            echo "<script type='text/javascript'>alert('$message');</script>";
        } else {
            $_SESSION['bid'] = $user;
            $message = "Supi guti";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }

    return runTemplate( "../templates/".getValue("func").".htm.php" );
}

/*
 * Beinhaltet die Anwendungslogik zur Registration
 */
function registration() {
    setValue("phpmodule", $_SERVER['PHP_SELF']."?id=".getValue("func"));

    if (isset($_POST['regi_email'])){
        $passwort = $_POST['regi_passwort'];
        $passwort2 = $_POST['regi_passwort2'];
        if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,}$/', $_POST['regi_passwort'])) {
            $result = '<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';

        }else if ($passwort == $passwort2) {
                db_insert_benutzer($_POST);
        }

    }

    return runTemplate( "../templates/".getValue("func").".htm.php" );
}

function logout() {
    //setValue("phpmodule", $_SERVER['PHP_SELF']."?id=".getValue("func"));

    session_destroy();


    return runTemplate( "../templates/index.htm.php" );
}

?>
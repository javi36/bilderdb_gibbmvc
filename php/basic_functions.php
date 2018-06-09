<?php
/*
 *  @autor Michael Abplanalp
 *  @version März 2018
 *  Dieses Modul stellt grundlegende Funktionen zur Verfügung und ist damit
 *  Bestandteil des MVC-IET-gibb
 */

/*
 * Liefert die über den Parameter "id" definierte Funktion zurück
 */
function getId() {
  if (isset($_GET['id'])) return $_GET['id'];
  else return "";
}

/*
 * Gibt den Inhalt eines POST-Attributes zurück
 */
function getPost($attr, $defvalue="") {
	$value = $defvalue;
	if (isset($_POST[$attr])) {
		if (!empty($_POST[$attr])) $value = $_POST[$attr];
	}
	return $value;
}

/* Führt ein HTML-Template aus und gibt das Produkt zurück
 * @param     $template     Filename des Templates
 * @param     $params       Assoziativer Array mit Werten, welche im Template eingefügt werden.
 *                          key: Name der Variable, value: Wert
 */
function runTemplate($template) {
  ob_start();
  require($template);
  $inhalt=ob_get_contents();
  ob_end_clean();
  return $inhalt;
}

/*
 * Einen Wert im globalen Array $params speichern.
 * @param       $key        Schlüssel des Wertes (Index im globalen Array
 * @param       $value      Wert des Wertes
 *
 */
function setValue($key, $value) {
  global $params;
  $params[$key] = $value;
}

/*
 * Mehrere Werte im globalen Array $params speichern.
 * @param       $list      Assoziativer Array mit den zu speichernden Werten
 *
 */
function setValues($list) {
  global $params;
  if (count($list)) {
	foreach ($list as $k=>$v) {
	  $params[$k] = $v;
	}
  }
}

/*
 * Wert aus dem globalen Array lesen
 * @param       $field      Index des gewünschten Wetes
 *
 */
function getValue($key) {
  global $params;
  if (isset($params[$key])) return $params[$key];
  else return "";
}

/*
 * Erstellt das Menu und gibt dieses aus. Wird im Haupttemplate aufgerufen.
 * @param   $mlist      Array mit den Menueinträgen. key: ID (Funktion), value: Menuoption
 */
function getMenu($mlist) {
  $menu = "";
  if (count($mlist)) {
	$active_link = getValue("func");
	if (empty($active_link)) $active_link=key($mlist);
	foreach ($mlist as $element=>$option) {
	  $active = "";
	  if ($element == $active_link) $active = " class='active'";
	  $menu .= "<li$active><a href='".$_SERVER['PHP_SELF']."?id=".$element."'>$option</a></li>";
	}
	return $menu;
  }
}

/*
 * Wert aus dem globalen Array lesen und in HTML-Syntax umwandeln
 * @param       $field      Index des gewünschten Wetes
 *
 */
function getHtmlValue($key) {
    global $params;
	if (isset($params[$key])) return htmlentities($params[$key]);
	else return "";
}

/**
 * Übergebene SQL-Anweisung auf der DB ausführen und Resultat zurückgeben.
 * @param   $sql       Select-Befehl, welcher ausgeführt werden soll
 */
function sqlSelect($sql) {
 	$result = mysqli_query(getValue("cfg_db"), $sql);
 	if (!$result) die("Fehler: ".mysqli_error());
	if (mysqli_num_rows($result) > 0) {
		while ($row=mysqli_fetch_assoc($result)) $data[]=$row;
	} else $data = "";
	mysqli_free_result($result);
	return $data;
}

/**
 * Führt einen SQL-Befehl aus.
 * @param   $sql    SQL-Befehl, welcher ausgeführt werden soll
 */
 function sqlQuery($sql) {
	$result = mysqli_query(getValue("cfg_db"), $sql);
 	if (!$result) die(mysqli_error(getValue("cfg_db"))."<pre>".$sql."</pre>");
}

/**
 * Aktives php-Modul noch einmal aufrufen.
 * @param   $id     ID der Funktion, welche aufgerufen werden soll
 */
function redirect($id="") {
    if (!empty($id)) $id="?id=$id";
    header("Location: ".$_SERVER['PHP_SELF'].$id);
    exit();
}

/**
 * Prüft, ob ein Eingabewert leer ist oder nicht.
 * @param   $value      Eingabewert
 * @param   $minlength  Minimale Länge der Eingabe
 */
function checkEmpty($value, $minlength=Null) {
    if (empty($value)) return false;
    if ($minlength != Null && strlen($value) < $minlength) return false;
    else return true;
}

/**
 * Prüft, ob ein Eingabewert eine bestimmte Länge hat.
 * @param   $value      Eingabewert
 * @param   $length     Geforderte Länge
 */
function checkLength($value, $length) {
    if (strlen($value) != $length) return false;
    else return true;
}

/**
 * Prüft, ob es sich beim übergebenen Wert um eine Zahl handelt.
 * @param   $value      übergebender Wert
 */
function isNumber($value) {
  if (is_numeric($value)) return true;
  else return false;
}

// Prüft, ob der Benutzer angemeldet ist
function getUserIdFromSession() {
    if (isset($_SESSION['bid'])) {
        $sessionId = $_SESSION['bid'];
        if (!isset($sessionId)) {
            return 0;
        }
        return $sessionId;
    } else{
        return 0;
    }
}

function getGaleriePfad(){
    $aktuelleGalerie = db_getGalerie($_GET['gid']);

    return 'C:/xampp/htdocs/m151/bilderdb_gibbmvc/uploadedImages/'.getUserIdFromSession()[0]['bid'].$aktuelleGalerie[0]['name'];
}

function getBildExtension($bildExtension){
    $extension = null;
    if (strcmp($bildExtension, 'image/jpeg') === 0){
        $extension = '.jpg';
    }elseif (strcmp($bildExtension, 'image/png') === 0){
        $extension = '.png';
    }elseif (strcmp($bildExtension, 'image/gif') === 0) {
        $extension = '.gif';
    }
    return $extension;
}

function uploadImage(){
    $newName = time()+rand(1,100);
    $newPath = str_replace("\\", "/", getGaleriePfad());

    $extension = getBildExtension($_FILES['bild']['type']);
    $newPath .= '/'.$newName.$extension;
    setValue("bildName",  $newName.$extension);
    if (is_null($extension)){
        $message = "Kein richtigen Format";
        setValue("uploaded", $message );
    }

    if ($_FILES['bild']['size'] <= 4000000){
        move_uploaded_file($_FILES['bild']['tmp_name'], $newPath);
        $message = "Erfolgreich hochgeladen";
        setValue("uploaded", $message );
    }else{
        $message = "Bild ist zu gross";
        setValue("uploaded", $message );
    }
    return $newPath;
}


function make_thumb($src, $dest, $desired_width) {

    /* read the source image */
    $source_image = null;
    if (strcmp($_FILES['bild']['type'], 'image/jpeg') === 0){
        $source_image = imagecreatefromjpeg($src);
    }elseif (strcmp($_FILES['bild']['type'], 'image/png') === 0){
        $source_image = imagecreatefrompng($src);
    }elseif (strcmp($_FILES['bild']['type'], 'image/gif') === 0) {
        $source_image = imagecreatefromgif($src);
    }

    $width = imagesx($source_image);
    $height = imagesy($source_image);

    /* find the "desired height" of this thumbnail, relative to the desired width  */
    $desired_height = floor($height * ($desired_width / $width));

    /* create a new, "virtual" image */
    $virtual_image = imagecreatetruecolor($desired_width, $desired_height);

    /* copy source image at a resized size */
    imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);

    /* create the physical thumbnail image to its destination */
    if (strcmp($_FILES['bild']['type'], 'image/jpeg') === 0){
        imagejpeg($virtual_image, $dest);
    }elseif (strcmp($_FILES['bild']['type'], 'image/png') === 0){
        imagepng($virtual_image, $dest);
    }elseif (strcmp($_FILES['bild']['type'], 'image/gif') === 0) {
        imagegif($virtual_image, $dest);
    }

}

function loeschen($path)
{
    if (is_dir($path) === true) {
        $files = array_diff(scandir($path), array('.', '..'));

        // Durch die vorhandenen Dateien laufen
        foreach ($files as $file) {
            loeschen(realpath($path) . '/' . $file);
        }
        return rmdir($path);
    }
// Datei entfernen
    else if (is_file($path) === true) {
    return unlink($path);
    }
return false;
}
<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 03.05.2018
 * Time: 13:13
 */

$aktuelleGalerie = db_getGalerie($_GET['gid']);

?>
<form class="" name="" action="" method="post">
    <span class="label-input100" for="galerieName">Name *</span>
    <input class="input100" type="text" id="galerieName" value="<?php echo $aktuelleGalerie[0]['name']; ?>" name="galerieName">
    <br>
    <span class="label-input100" for="galerieBeschreibung">Beschreibung</span>
    <textarea class="input100" rows="6" cols="20" type="text"
              id="galerieBeschreibung" name="galerieBeschreibung"><?php echo $aktuelleGalerie[0]['beschreibung']; ?></textarea>

    <button type="submit" class="btn btn-success">Bearbeiten</button>
    <a type="button" href="index.php?id=zeigeMeineGalerien" class="btn btn-warning">Abbrechen</a>
    <p style="color: rgb(150,86,242);"><?php echo getValue("RegiError")?></p>
</form>


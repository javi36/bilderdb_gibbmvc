<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 20.05.2018
 * Time: 15:41
 */

$aktuelleGalerie = db_getGalerie($_GET['gid']);

?>

<form method='post' enctype='multipart/form-data'>
    <button class="btn btn-success" type="submit">Hochladen</button>
    <input  name="bild"
           type="file" accept="image/*"
           data-toggle="tooltip" data-placement="top"
           data-html="true" title="Die Größe darf maximal 4MB sein!">
    <p><?php echo getValue("uploaded"); ?></p>
</form>


<div class="col-md-12">
    <h2>Galerie <?php echo $aktuelleGalerie[0]['name']; ?> </h2>
    <label>Beschreibung: <?php echo $aktuelleGalerie[0]['beschreibung']; ?></label>
    <?php


    ?>
    <h4>Meine Bilder</h4>
</div>


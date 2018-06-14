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
    <input name="bild"
           type="file" accept="image/*"
           data-toggle="tooltip" data-placement="top"
           data-html="true" title="Die Größe darf maximal 4MB sein!">
    <p><?php echo getValue("uploaded"); ?></p>
    <input class="input100" name="bildername"/>
</form>


<div class="col-md-12">
    <h2>Galerie <?php echo $aktuelleGalerie[0]['name']; ?> </h2>
    <label>Beschreibung: <?php echo $aktuelleGalerie[0]['beschreibung']; ?></label>

    <h4>Meine Bilder</h4>
    <?php
 
    $bilderPfade = db_getGalerieBilder();
    $name = getValue("bildName");
    if (!empty($bilderPfade)) {
        foreach ($bilderPfade as $bildPfad) {
            echo '<div class="gallery">
		            <div class="container">
			            <div class="row">
                            <div class="col-xs-3 gallery-item">
                                <a href="../uploadedImages/' . getUserIdFromSession()[0]['bid'] . $aktuelleGalerie[0]['name'] . '/' . $name . '" class="thumbnail">
                                    <img  class="img-responsive img-gallery" src="../uploadedImages/' . getUserIdFromSession()[0]['bid'] . $aktuelleGalerie[0]['name'] . '/thumbnail/' . $bildPfad['thumbnailName'] . '">
                                    <figcaption class="figure-caption">'.$bildPfad['bilderName'].'</figcaption>
                                </a>
                                 <a type="button" class="btn btn-danger"  href="index.php?id=loescheBild&bilderID=' . $bildPfad['bilderID'] . '">Löschen</a>
                            </div>
                        </div>
                    </div>
                 </div>';

        }
    }

    ?>

</div>


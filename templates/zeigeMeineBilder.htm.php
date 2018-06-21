<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 20.05.2018
 * Time: 15:41
 */

$aktuelleGalerie = db_getGalerie($_GET['gid']);

?>
<link rel="stylesheet" href="../css/entries.css">
<div class="limiter" style=" background-image: url('../images/bild.png');">
<section id="home" class="main-contact parallax-section">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <form method='post' enctype='multipart/form-data'>

                    <p><?php echo getValue("uploaded"); ?></p>
                    <input class="input100" name="bildname" /><br>
                    <input name="bild" style="display: inline-block !important;margin-top: 20px;"
                           type="file" accept="image/*"
                           data-toggle="tooltip" data-placement="top"
                           data-html="true" title="Die Größe darf maximal 4MB sein!"> <br>

                    <button style="background: #033769; border-color: #033769; margin-top: 20px;" class="btn btn-success" type="submit">Hochladen</button>
                </form>
            </div>
        </div>
    </div>
</section>



<div class="col-md-12" style="text-align: center">
    <h2 style="color: #033769;">Galerie <?php echo $aktuelleGalerie[0]['name']; ?> </h2>
    <label style="color: #033769; margin-bottom: 50px;">Beschreibung: <?php echo $aktuelleGalerie[0]['beschreibung']; ?></label>

    <?php
 
    $bilderPfade = db_getGalerieBilder();
    if (!empty($bilderPfade)) {
        foreach ($bilderPfade as $bildPfad) {
            echo '<div class="gallery" >
		            <div class="container">
			            <div class="row">
                            <div class="col-xs-3 gallery-item" style="margin-top: 20px; ">
                                <a href="../uploadedImages/' . getUserIdFromSession()[0]['bid'] . $aktuelleGalerie[0]['name'] . '/' . $bildPfad['bildName'] . '" class="thumbnail">
                                    <img  class="img-responsive img-gallery" src="../uploadedImages/' . getUserIdFromSession()[0]['bid'] . $aktuelleGalerie[0]['name'] . '/thumbnail/' . $bildPfad['thumbnailName'] . '">
                                    <figcaption style="color: black;" class="figure-caption">'.$bildPfad['benutzerBildName'].'</figcaption>
                                </a>
                                 <a type="button" class="btn" style="background-color: #FFB3D1; color: white;"  href="index.php?id=loescheBild&bilderID=' . $bildPfad['bilderID'] . '">Löschen</a>
                            </div>
                        </div>
                    </div>
                 </div>';

        }
    }

    ?>

</div>


<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 03.05.2018
 * Time: 13:13
 */

$aktuelleGalerie = db_getGalerie($_GET['gid']);

?>

<html style=" background-image: url('../images/bild.png');">
    <div class="container" style="margin-top: 150px;">
        <div class="col-md-12">
            <form class="" name="" action="" method="post">
                <div class="form-group">
                    <p style="color: rgb(150,86,242);"><?php echo getValue("RegiError")?></p>
                    <span for="galerieName">Name *</span>
                    <input type="text" id="galerieName" class="form-control" value="<?php echo $aktuelleGalerie[0]['name']; ?>" name="galerieName">
                    <br>
                    <div style="margin-top: 50px;">
                        <span for="galerieBeschreibung" >Beschreibung</span>
                        <textarea  rows="6" cols="20" type="text" class="form-control"
                                  id="galerieBeschreibung" name="galerieBeschreibung"><?php echo $aktuelleGalerie[0]['beschreibung']; ?></textarea>
                    </div>
                    <button type="submit" class="btn " style="margin-top: 150px; background-color: #033769; color: white;">Bearbeiten</button>
                    <a type="button" href="index.php?id=zeigeMeineGalerien" style="margin-top: 150px; background-color: #ffb3d1; color: white;" class="btn ">Abbrechen</a>

                    </div>
            </form>
        </div>
    </div>
</html>



<?php
/**
 * Created by PhpStorm.
 * User: Javier
 * Date: 26.03.2018
 * Time: 19:50
 */
$loggedInUser = getUserIdFromSession();
$galleries = db_getAllGalerie($loggedInUser[0]['bid']);
/*
 * Problem: Es wird alle Modals der Galerien jeweils gleichzeitig geöffnet wenn man das löschen button klickt.
 * Es soll nur ein Modla geöffnet werden.
 */
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/entries.css">
<div class="limiter" style=" background-image: url('../images/BG_projects.jpg');">
<section id="home" class="main-contact parallax-section">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <h1 style="text-align: center" >Willkommen in deinem Memberbereich</h1>
                <h3 style="text-align: center; margin-bottom: 100px;">Hier kannst du deine Galerien Erstellen, Bearbeiten oder Löschen</h3>
            </div>
        </div>
    </div>
</section>
</div>
<div class="container" style="margin-top: 20px; margin-bottom: 30px;">
    <div class=row">


<?php
if ($galleries == null){
    echo ' <div class="col-md-12">
                <h4 class="col-md-6"> Du hast keine Galerien! </h4>
            </div>';
}else {
    foreach ($galleries as $galerie) {

        echo ' <a href="index.php?id=bilderHochladen&gid=' . $galerie['gid'] . '">
                <div class="col-md-4" style="text-align: center;">
                    <img src="" alt="" width="100" height="100">
                    <div class="desc">' . $galerie['name'] . '</div>
                        <a class="btn btn-primary" href="index.php?id=galerieBearbeiten&gid=' . $galerie['gid'] . '" > <span class="glyphicon glyphicon-pencil"></span> Edit </a>
                        <button type="button" class="btn" data-toggle="modal" data-target=".bd-example-modal-sm" style="background-color: #ffb3d1; color: white;"><span class="glyphicon glyphicon-trash"></span> Delete</button>
                </div> </a> 
                
            ';
        echo '<div class="modal fade bd-example-modal-sm" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Galerie löschen</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Wollen Sie diese "' . $galerie['name'] . '" Galerie wirklich löschen?</p>
                        </div>
                        <div class="modal-footer">
                            <a type="button" class="btn btn-primary" href="index.php?id=galerieLoeschen&gid=' . $galerie['gid'] . '" >Löschen</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Schliessen</button>
                        </div>
                    </div>
                </div>
            </div>
            
            ';
    }
}

?>



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
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<head>
    <div class="col-md-12">
        <h2>Meine Galerien </h2>
    </div>

    <style>
        div.gallery {
            margin: 5px;
            border: 1px solid #ccc;
            float: left;
            width: 180px;
        }

        div.gallery:hover {
            border: 1px solid #777;
        }

        div.gallery img {
            width: 100%;
            height: auto;
        }

        div.desc {
            padding: 15px;
            text-align: center;
        }
    </style>
</head>
<body>

<?php
if ($galleries == null){
    echo ' <div class="col-md-12">
                <h4 class="col-md-6"> Du hast keine Galerien! </h4>
            </div>';
}else {
    foreach ($galleries as $galerie) {

        echo '<div class="gallery">
            <a href="index.php?id=bilderHochladen&gid=' . $galerie['gid'] . '">
                <img src="" alt="" width="100" height="100">
            </a>
            <div class="desc">' . $galerie['name'] . '</div>
            <a class="btn btn-primary" href="index.php?id=galerieBearbeiten&gid=' . $galerie['gid'] . '"> Bearbeiten </a>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bd-example-modal-sm">Löschen</button>
            </div> 
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


</body>


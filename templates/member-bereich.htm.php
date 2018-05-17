<?php
/**
 * Created by PhpStorm.
 * User: Javier
 * Date: 26.03.2018
 * Time: 19:50
 */
$loggedInUser = getUserIdFromSession();
$galleries = db_getAllGalerie($loggedInUser[0]['bid']);

?>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<head>
    <div class="col-md-12">
        <h3>Meine Galerien  </h3>
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
foreach ($galleries as $galerie){

    echo '<div class="gallery">
            <a target="_blank">
                <img src="" alt="" width="100" height="100">
            </a>
            <div class="desc">'.$galerie['name'].'</div>
            <a href=""><i class="material-icon">create</i></a>
            </div>';
}


?>

</body>


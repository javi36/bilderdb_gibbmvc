<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 03.05.2018
 * Time: 13:13
 */


?>
<link rel="stylesheet" type="text/css" href="../css/galerieErstellen.css">
<div class="limiter">
    <div class="container-fluid container-login100" >
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54" ">
        <form class="login100-form validate-form" name="kontakt" action="" method="post">
            <div style="margin-bottom: 60px;">
					<span class="login100-form-title p-b-49" style="font-size: 50px; color: rgb(150,86,242); font-weight: bold; ">
						Galerie erstellen
					</span>
            </div>
            <div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired" style="padding-bottom: 40px;" >
                <span class="label-input100" style="font-size: 20px; color: rgb(118,131,239); font-weight: bold;  " for="galerieName">Name *</span>
                <input class="input100" type="text" id="galerieName" name="galerieName"  style="border-bottom: 1px solid #ccc !important;">
                <span class="focus-input100" data-symbol="&#xf206;"></span>
            </div>

            <div class="wrap-input100 validate-input" data-validate="Password is required" style="padding-bottom: 40px;">
                <span class="label-input100"  style="font-size: 20px; color: rgb(118,131,239); font-weight: bold;" for="galerieBeschreibung">Beschreibung</span>
                <input class="input100" rows="6" cols="20" type="text"style= "border-bottom: 1px solid #ccc !important;" id="galerieBeschreibung" name="galerieBeschreibung">
                <span class="focus-input100" data-symbol="&#xf190;"></span>
            </div>

            <div class="container-login100-form-btn">
                <div class="wrap-login100-form-btn col-lg-6">
                    <button type="submit" class="login100-form-btn" name="login" id="login">
                        Erstellen
                    </button>
                </div>
                <div class="wrap-login100-form-btn col-lg-6">
                    <a type="button" href="index.php?id=zeigeMeineGalerien" class="login100-form-btn">Abbrechen</a>
                </div>
            </div>
        </form>
    </div>
</div>

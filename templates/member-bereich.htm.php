<?php
/**
 * Created by PhpStorm.
 * User: Javier
 * Date: 26.03.2018
 * Time: 19:50
 */


?>
<button class="btn btn-primary" data-toggle="modal" data-target="#erstellen">Fotogalerie erstellen</button>

<div class="col-md-12">
   <h3>Willkommen  </h3>
</div>


<div class="modal fade" id="erstellen" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Fotogalerie erstellen</h4>
            </div>
            <div class="modal-body">
                <span class="label-input100"  for="galerieName">Name *</span>
                <input class="input100" type="text" id="galerieName" name="galerieName"  >
                <br>
                <span class="label-input100"  for="galerieBeschreibung">Beschreibung</span>
                <input class="input100" type="text" id="galerieBeschreibung" name="galerieBeschreibung"  >
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success">Erstellen</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Abbrechen</button>
            </div>
        </div>

    </div>
</div>
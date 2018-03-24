<div class="col-md-12">
<form name="registration" class="form-horizontal form-condensed" action="" method="post">
    <div class="form-group control-group">
        <label class="control-label col-md-offset-2 col-md-2" for="regi_nickname">Nickname</label>
        <div class="col-md-4">
            <input type="text" class="form-control" id="regi_nickname" name="regi_nickname" value="" />
        </div>
    </div>
    <div class="form-group control-group">
	<label class="control-label col-md-offset-2 col-md-2" for="regi_email">E-Mail</label>
	<div class="col-md-4">
	  <input type="email" class="form-control" id="regi_email" name="regi_email" value="" />
	</div>
  </div>
  <div class="form-group control-group">
	<label class="control-label col-md-offset-2 col-md-2" for="regi_passwort">Passwort</label>
	<div class="col-md-4">
	  <input type="password" class="form-control" id="regi_passwort" name="regi_passwort" value="" />
	</div>
  </div>
    <div class="form-group control-group">
        <label class="control-label col-md-offset-2 col-md-2" for="regi_passwort2">Passwort widerholen</label>
        <div class="col-md-4">
            <input type="password" class="form-control" id="regi_passwort2" name="regi_passwort2" value="" />
        </div>
    </div>
  <div class="form-group control-group">
	<div class="col-md-offset-4 col-md-4">
	  <button type="submit" class="btn btn-success" name="registration" id="registration">Registration</button>
	</div>
  </div>
    <div class="form-group control-group ">
        <div class="col-md-offset-4 col-md-4">
            <?php $result=""; echo $result; ?>
        </div>
    </div>

</form>
</div>

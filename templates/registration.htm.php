
<link rel="stylesheet" type="text/css" href="../css/LoginAndRegister.css">
<div class="limiter" id="divregi">
    <div class="container-fluid container-login100">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54" style="height: 850px;">
        <form class="login100-form validate-form" name="registration" action="" method="post" >
            <div style="margin-bottom: 60px;">
					<span class="login100-form-title p-b-49" style="font-size: 50px; color: rgb(150,86,242); font-weight: bold; ">
						Registration
					</span>
                <p style="color: rgb(150,86,242);"><?php echo getValue("RegiError")?></p>
            </div>
            <div class="wrap-input100 validate-input" data-validate="Nickname is required" style="padding-bottom: 40px;">
                <span class="label-input100"  style="font-size: 20px; color: rgb(118,131,239); font-weight: bold;" for="regi_nickname">Nickname</span>
                <input class="input100" type="text" id="regi_nickname" name="regi_nickname" style= "border-bottom: 1px solid #ccc !important;"/>
                <span class="focus-input100" data-symbol="&#xf206;"></span>
            </div>
            <div class="wrap-input100 validate-input m-b-23" data-validate = "Email is required" style="padding-bottom: 40px;" >
                <span class="label-input100" style="font-size: 20px; color: rgb(118,131,239); font-weight: bold;  " for="regi_email">Email *</span>
                <input class="input100" type="email" id="regi_email" name="regi_email"  style="border-bottom: 1px solid #ccc !important;">
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
            </div>
            <div class="wrap-input100 validate-input" data-validate="Password is required" style="padding-bottom: 40px;">
                <span class="label-input100"  style="font-size: 20px; color: rgb(118,131,239); font-weight: bold;"for="regi_passwort">Passwort *</span>
                <input class="input100" type="password" id="regi_passwort" name="regi_passwort" style= "border-bottom: 1px solid #ccc !important;" >
                <span class="focus-input100" data-symbol="&#xf190;"></span>
            </div>
            <div class="wrap-input100 validate-input" data-validate="Password is required" style="padding-bottom: 40px;">
                <span class="label-input100"  style="font-size: 20px; color: rgb(118,131,239); font-weight: bold;" for="regi_passwort2">Passwort wiederholen *</span>
                <input class="input100" type="password" id="regi_passwort2" name="regi_passwort2" style= "border-bottom: 1px solid #ccc !important;" >
                <span class="focus-input100" data-symbol="&#xf190;"></span>
            </div>

            <div class="container-login100-form-btn">
                <div class="wrap-login100-form-btn">
                    <div class="login100-form-bgbtn"></div>
                    <button type="submit" class="login100-form-btn" name="registration" id="registration">
                        Registrieren
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>




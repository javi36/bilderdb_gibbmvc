
<link rel="stylesheet" type="text/css" href="../css/LoginAndRegister.css">
<div class="limiter">
    <div class="container-fluid container-login100" >
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54" ">
            <form class="login100-form validate-form" name="kontakt" action="" method="post">
                <div style="margin-bottom: 60px;">
					<span class="login100-form-title p-b-49" style="font-size: 50px; color: rgb(150,86,242); font-weight: bold; ">
						Login
					</span>

                    <p><?php echo getValue("LoginError"); ?></p>
                </div>
                <div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired" style="padding-bottom: 40px;" >
                    <span class="label-input100" style="font-size: 20px; color: rgb(118,131,239); font-weight: bold;  " for="email">Username</span>
                    <input class="input100" type="email" name="email"  style="border-bottom: 1px solid #ccc !important;">
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Password is required" style="padding-bottom: 40px;">
                    <span class="label-input100"  style="font-size: 20px; color: rgb(118,131,239); font-weight: bold;" for="passwort">Password</span>
                    <input class="input100" type="password" name="passwort" id="passwort" style= "border-bottom: 1px solid #ccc !important;" >
                    <span class="focus-input100" data-symbol="&#xf190;"></span>
                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button type="submit" class="login100-form-btn" name="login" id="login">
                            Login
                        </button>
                    </div>
                </div>
            </form>
    </div>
</div>



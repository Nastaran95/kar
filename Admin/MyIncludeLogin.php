<?php
/**
 * Created by PhpStorm.
 * User: HamidReza
 * Date: 9/12/2017
 * Time: 12:34 AM
 */
?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-login">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form method="post" action="Login.php" id="login-form" onsubmit="return validateFormLogin()">
                            <div class="form-group">
                                <input type="text" name="usernamelogin" id="usernamelogin" tabindex="1"
                                       class="form-control" placeholder="شماره موبایل" value="" data-val-length="الزامی">
                                <span id="errmsgall10"> </span>
                            </div>
                            <div class="form-group">
                                <input type="password" name="passwordlogin" id="passwordLogin" tabindex="1"
                                       class="form-control" placeholder="کلمه عبور" >
                                <span id="errmsgall11"> </span>
                            </div>
                            <div class="form-group text-center">
                                <label for="remember">مرا به خاطر بسپار</label>
                                <input type="checkbox" tabindex="3" class="" name="rememberMe" id="remember">
                            </div>
                            <div class="CENTERCLASS">
                                <div class="g-recaptcha" data-sitekey="6Lc4HWwUAAAAABvJm3EN1IHiJRbXRgshBooqo1D0"></div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <input type="submit" name="loginsubmit" id="login-submit" tabindex="4"
                                               class="form-control btn btn-succe" value="ورود">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
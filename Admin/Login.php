<?php
/**
 * Created by PhpStorm.
 * User: HamidReza
 * Date: 8/27/2017
 * Time: 12:11 AM
 * https://www.google.com/recaptcha/admin#site/339248547?setup
 */
session_start();
$inactive = 3600;
if (isset($_SESSION['testing']) && (time() - $_SESSION['testing'] > $inactive)) {
    // last request was more than 2 hours ago
    session_unset();     // unset $_SESSION variable for this page
    session_destroy();   // destroy session data
}
$_SESSION['testing'] = time(); // Update session
include '../Settings.php';

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <title>ورود</title>
        <link rel="stylesheet" href="../css/bootstrap.css"/>
        <script src="../js/jQuery.js"></script>
        <script src="../js/bootstrap.js"></script>
        <script src="js/Login.js"></script>
        <link rel="stylesheet" href="../css/global.css"/>
        <script src='https://www.google.com/recaptcha/api.js?hl=fa'></script>
    </head>
    <body dir="rtl">
    <?php
    if (isset($_SESSION["logged_in"])&& $_SESSION["logged_in"]){
        echo "<meta http-equiv=\"refresh\" content=\"0;url=./admin.php\">";
        exit();
    }else {
    if (isset($_POST['usernamelogin'])) {
                            $post_data = http_build_query(
                                array(
                                    'secret' => '6Lc4HWwUAAAAADhYJYPvsoSaEmci9eMG7pYM9wT8',
                                    'response' => $_POST['g-recaptcha-response'],
                                    'remoteip' => $_SERVER['REMOTE_ADDR']
                                )
                            );
                            $opts = array('http' =>
                                array(
                                    'method'  => 'POST',
                                    'header'  => 'Content-type: application/x-www-form-urlencoded',
                                    'content' => $post_data
                                )
                            );
                            $context  = stream_context_create($opts);
                            $result = file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $context);


//                echo $result;
//                $recaptcahresponse=$_POST['g-recaptcha-response'];
//                $url = 'https://www.google.com/recaptcha/api/siteverify';
//                $data = array('secret' => '6Lc4HWwUAAAAADhYJYPvsoSaEmci9eMG7pYM9wT8', 'response' => $recaptcahresponse);
//
//                // use key 'http' even if you send the request to https://...
//                $options = array(
//                    'http' => array(
//                        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
//                        'method'  => 'POST',
//                        'content' => http_build_query($data)
//                    )
//                );
//                $context  = stream_context_create($options);
//                $result = file_get_contents($url, 0, $context);
//                $json = json_decode($output);
//                echo $result;
    // $result === FALSE
                            if ($result === FALSE) {
                            include '../Header.php';
                            ?>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            <div class="container paddingtop">
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="panel panel-login">
                                            <div class="row">
                                                <div class="col-xs-11">
                                                    <h4> پیام امنیتی بدرستی وارد نشده است.
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                include 'MyIncludeLogin.php';
                                }else{
                                $result = json_decode($result);
                                // !$result->success
                                if (!$result->success) {
                                include '../Header.php';
                                ?>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <div class="container paddingtop">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-3">
                                            <div class="panel panel-login">
                                                <div class="row">
                                                    <div class="col-xs-11">
                                                        <h4> پیام امنیتی بدرستی وارد نشده است.
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    include 'MyIncludeLogin.php';
                                    }else {
                                    $mobile = $_POST["usernamelogin"];
                                    $password = $_POST["passwordlogin"];
                                    if (isset($_POST["rememberMe"])) {
                                        $rememberME = $_POST["rememberMe"];
                                    } else {
                                        $rememberME = 'off';
                                    }
                                    $stmt = $connection->prepare("SELECT mobile,name,family,money,type,verified FROM users WHERE (mobile=? AND Password=?)");
                                    $stmt->bind_param("ss", $mobile, $password);
                                    $stmt->execute(); //execute() tries to fetch a result set. Returns true on succes, false on failu
                                    $result = $stmt->get_result();
                                    if ($result->num_rows > 0) {
                                        $name = "";
                                        $family = "";
                                        $type = "";
                                        $money = "";
                                        $row = $result->fetch_assoc();
                                        $stmt->close();
                                        $name = $row["name"];
                                        $family = $row["family"];
                                        $money = $row["money"];
                                        $type = $row["type"];
                                        $mail = $mobile;
                                        $verified = $row["verified"];
                                        if ($verified) {
                                            $_SESSION["email"] = $mail;
                                            $_SESSION["logged_in"] = true;
                                            $_SESSION["name"] = $name;
                                            $_SESSION["family"] = $family;
                                            $_SESSION["money"] = $money;
                                            $_SESSION["type"] = $type;
                                            $_SESSION["remember"] = $rememberME;
                                            $token = generateToken2();
                                            if ($rememberME == 'on') {
                                                setcookie("token2", $mobile, time() + (10 * 365 * 24 * 60 * 60));
                                                setcookie("token1", $token, time() + (10 * 365 * 24 * 60 * 60));
                                                $sql = "INSERT INTO token (token,token2)  VALUES ('$token','$mobile')";
                                                if (mysqli_query($connection, $sql)) {

                                                }
                                            } else {
                                                $sql = "DELETE FROM token WHERE token2='$mobile'";
                                                if (mysqli_query($connection, $sql)) {

                                                }
                                                setcookie("token2", $mobile, time() + (10 * 365 * 24 * 60 * 60));
                                                setcookie("token1", $token, time() + (10 * 365 * 24 * 60 * 60));
                                            }
                                            echo "<meta http-equiv=\"refresh\" content=\"0;url=./admin.php\">";
                                            exit();
                                        }
                                    }else{
                                    include '../Header.php';
                                    ?>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <div class="container paddingtop">
                                        <div class="row">
                                            <div class="col-md-6 col-md-offset-3">
                                                <div class="panel panel-login">
                                                    <div class="row">
                                                        <div class="col-xs-11">
                                                            <h4> رمز وارد شده اشتباه است.
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        include 'MyIncludeLogin.php';
                                    }
                                }
                            }
    }else {
        include '../Header.php';
        ?>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <div class="container paddingtop">
            <?php
            //nothing show loginregister
            include 'MyIncludeLogin.php';
    }
    }
        ?>
    </div>
    <?php
    include '../Footer.php';
    ?>
    <script type="text/javascript" charset="utf-8">
        var onloadCallback = function() {
            var recaptchas = document.querySelectorAll('div[class=g-recaptcha]');
            for( i = 0; i < recaptchas.length; i++) {
                grecaptcha.render(recaptchas[i], {
                    'sitekey': '6Lc4HWwUAAAAABvJm3EN1IHiJRbXRgshBooqo1D0',
                });
            }
        }
    </script>
    </body>
    <link rel="stylesheet" href="/css/Login.css"/>
    </html>

<?php
function generateRandomString($length = 6) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function generateToken2($length = 20)
{
    return bin2hex(openssl_random_pseudo_bytes($length));
}
function wp_check_password($password, $hash, $user_id = '') {
    global $wp_hasher;

    // If the hash is still md5...
    if ( strlen($hash) <= 32 ) {
        $check = hash_equals( $hash, md5( $password ) );
        if ( $check && $user_id ) {
            // Rehash using new hash.
            wp_set_password($password, $user_id);
            $hash = wp_hash_password($password);
        }

        /**
         * Filters whether the plaintext password matches the encrypted password.
         *
         * @since 2.5.0
         *
         * @param bool       $check    Whether the passwords match.
         * @param string     $password The plaintext password.
         * @param string     $hash     The hashed password.
         * @param string|int $user_id  User ID. Can be empty.
         */
        return apply_filters( 'check_password', $check, $password, $hash, $user_id );
    }

    // If the stored hash is longer than an MD5, presume the
    // new style phpass portable hash.
    if ( empty($wp_hasher) ) {
        require_once( ABSPATH . WPINC . '/class-phpass.php');
        // By default, use the portable hash from phpass
        $wp_hasher = new PasswordHash(8, true);
    }

    $check = $wp_hasher->CheckPassword($password, $hash);

    /** This filter is documented in wp-includes/pluggable.php */
    return apply_filters( 'check_password', $check, $password, $hash, $user_id );
}
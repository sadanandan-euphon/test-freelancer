<?php
function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
 
    return $ipaddress;
}

function security($var)
{
    $var = trim($var);
    $var = mysql_real_escape_string($var);
    $var = htmlspecialchars($var);
    
    return $var;
}

function checkLoginUser()
{
    if(1 != $_SESSION["istangemeldet"])
    {
        $meldung = "1";
        header("Location:login.php?meldung=$meldung");
    }
}

function display_top($seite = '')
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $seite; ?></title>
    <style type="text/css">
        @import url(libcss/display_functions.css);
        @import url(libcss/login.css);
        @import url(libcss/main_page.css);
        @import url(libcss/custom-theme/jquery-ui-1.10.2.custom.css);
    </style>
    <script type="text/javascript" src="libjs/jQuery/js/jquery-1.8.0.min.js"></script>
    <script type="text/javascript" src="libjs/jQuery/js/jquery-ui-1.8.23.custom.min.js"></script>
    <script type="text/javascript" src="libjs/validation.js"></script>
    <script type="text/javascript" src="libjs/javascript.js"></script>
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <div id="wrapper_logo">
                <img src="images/giftguru-logo.jpg"></img>
            </div>
            <div id="wrapper_login">
                <div id="login" class="wtype1">
                    <?php
                    if(isset($_SESSION["istangemeldet"]) && 1 == $_SESSION["istangemeldet"])
                    {
                        echo '<a href="logout.php">ABMELDEN</a>';
                    }else
                    {
                        echo '<a href="login.php">ANMELDEN | REGISTRIEREN</a>';
                    }
                    ?>
                </div>
                <div id="howto" class="wtype1">
                    <a href="#">Wie funktioniert es?</a>
                </div>
            </div>
            <img src="images/header_border.jpg"></img>
        </div>

<?php
}

function display_bottom()
{
?>
        <div id="footer">
            <div id="wrapper_footer_data">
                <div id="footer_topics">
                     <ul>
                         <li><a href="#">So geht's</a></li>
                         <li><a href="#">FAQ</a></li>
                         <li><a href="#">Feedback's</a></li>
                    </ul>
                    <ul>
                         <li><a href="#">Team</a></li>
                         <li><a href="#">Presse</a></li>
                         <li><a href="#">Impressum</a></li>
                    </ul>
                </div>
                <div id="follow_us" class="wtype3">
                    <p>Folge uns</p>
                    <p>
                        <a href="#"><img src="images/facebook-icon.png"></img></a>
                        <a href="#"><img src="images/gplus-icon.png"></img></a>
                        <a href="#"><img src="images/twitter-icon.png"></img></a>
                        <a href="#"><img src="images/pinterest-icon.png"></img></a>
                        <a href="#"><img src="images/email-icon.png"></img></a>
                    </p>
                </div>
                <div id="newsletter" class="wtype3">
                    <p>Newsletter</p>
                    <input type="text" name="myText" value="Deine E-Mail Adresse" style="color:gray" onfocus="this.value=''">
                    </input>
                    <div id="newsletter_submit" class="wtype4">
                        ABBONIEREN
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
}
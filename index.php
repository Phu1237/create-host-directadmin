<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Free Hosting DirectAdmin Auto Creat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="css/flat-ui.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->
  </head>
<?php

###############################################################
# cPanel WHM Account Creator 1.1
###############################################################
# Visit http://www.zubrag.com/scripts/ for updates
###############################################################
# Required parameters:
# - domain - new account domain
# - user - new account username
# - password - new account password
# - package - new account hosting package (plan)
# - email - contact email
#
# Sample run: create-whm-account.php?domain=reseller.com&user=hosting&password=manager&package=unix_500
#
# If no parameters passed then input form will be shown to enter data.
#
# This script can also be run from another PHP script. This may
# be helpful if you have some user interface already in place and 
# want to automatically create WHM accounts from there.
# In this case you have to setup following variables instead of
# passing them as parameters:
# - $user_domain - new account domain
# - $user_name - new account username
# - $user_pass - new account password
# - $user_plan - new account hosting package (plan)
# - $user_email - contact email
#
###############################################################

///////  YOUR WHM LOGIN DATA
$whm_user   = "";
$whm_pass   = "";
$whm_ip   = "";
$whm_pack   = "";
#####################################################################################
##############          END OF SETTINGS. DO NOT EDIT BELOW    #######################
#####################################################################################

$whm_host   = $_SERVER['HTTP_HOST'];

function getVar($name, $def = '') {
  if (isset($_REQUEST[$name]))
    return $_REQUEST[$name];
  else
    return $def;
}

// X&#7917; l� d&#7919; li&#7879;u
if (!isset($domain)) {$domain = getVar('domain');}
if (!isset($username)) {$username = getVar('username');}
if (!isset($password)) {$passwd = getVar('password');}
if (!isset($email)) {$email = getVar('email');}
if (!empty($username)) {

  // create account on the cPanel server
  $script = "http://{$whm_user}:{$whm_pass}@{$whm_host}:2222/CMD_ACCOUNT_USER";
  $params = "?action=create&package={$whm_park}&domain={$domain}&username={$username}&passwd={$passwd}&passwd2={$passwd}&email={$email}&ip={$whm_ip}&notify=yes&add=Submit";
  $result = file_get_contents($script.$params);

  // output result
  echo "RESULT: " . $result;
}
// otherwise show input form
else {
$frm = <<<EOD
<html>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Free Hosting</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/flat-ui.css" rel="stylesheet">
<link rel="shortcut icon" href="images/favicon.ico">
<style>input { border: 1px solid black; }</style>
<!--[if lt IE 9]><script src="js/html5shiv.js"></script><![endif]-->
</head><body>
<div class="container">
<div class="demo-headline"><h1 class="demo-logo">DA.GIAITRI24HOL.NET<small>Free Hosting Auto Creat</small></h1></div> 
<div class="login"><div class="login-screen"><div class="login-icon">
<img src="images/login/icon.png" alt="Sent for us your information" />
</div>
<form method="post">
<div class="login-form">
<div class="control-group">
<input type="text" name="domain" class="login-field" value="" placeholder="Domain ( eg: giaitri24hol.net )" />
<label class="login-field-icon fui-man-16" for="login-name"></label>
</div>
<div class="control-group">
<input type="text" name="username" class="login-field" value="" placeholder="Usename hosting" />
<label class="login-field-icon fui-man-16" for="login-name"></label>
</div>
<div class="control-group">
<input type="password" name="password" class="login-field" value="" placeholder="Password hosting" />
<label class="login-field-icon fui-lock-16" for="login-pass"></label>
</div>
<div class="control-group">
<input type="text" name="email" class="login-field" value="" placeholder="Enter your email" />
<label class="login-field-icon fui-man-16" for="login-name"></label>
</div>
<input type="submit" class="btn btn-primary btn-large btn-block" value="Create">
</div></div></div>
<center>
<div class="row demo-tiles">
<div class="span3"><div class="tile">
<img class="tile-image big-illustration" alt="" src="images/illustrations/disk.png" />
<a class="btn btn-primary btn-large btn-block" href="#">4GB MB Disk Space</a>
</div></div>
<div class="span3"><div class="tile">
<img class="tile-image" alt="" src="images/illustrations/infinity.png" />
<a class="btn btn-primary btn-large btn-block" href="#">Unlimited Data Transfer</a>
</div></div>
<div class="span3"><div class="tile">
<img class="tile-image" alt="" src="images/illustrations/map.png" />
<a class="btn btn-primary btn-large btn-block" href="#">Data Center: Unknown</a>
</div></div>
<div class="span3"><div class="tile tile-hot">
<img class="tile-image big-illustration" alt="" src="images/illustrations/clipboard.png" />
<a class="btn btn-primary btn-large btn-block" href="#">DirectAdmin</a>
</div></div>
</div>
</center></div> <!-- /container -->
<footer>
<div class="container">
<div class="row">
<div class="span7"><p></p></div> <!-- /span8 -->
<div class="span5"><div class="footer-banner"><h3 class="footer-title">Terms of Services</h3>
              <ul>
                <li>Do not upload shell, malicious code ..etc..</li>
                <li>You are solely responsible for the content of your web pages</li>
                <li> Interfere with or disrupt the System or servers or networks connected to the System</li>
                <li></li>
              </ul>
              Contact : <a href="http://fb.com/Phu1237" target="_blank">fb.com/Phu1237</a>
</div></div></div></div></footer>
<!-- Load JS here for greater good =============================-->
<script src="js/jquery-1.8.2.min.js"></script>
<script src="js/jquery-ui-1.10.0.custom.min.js"></script>
<script src="js/jquery.dropkick-1.0.0.js"></script>
<script src="js/custom_checkbox_and_radio.js"></script>
<script src="js/custom_radio.js"></script>
<script src="js/jquery.tagsinput.js"></script>
<script src="js/bootstrap-tooltip.js"></script>
<script src="js/jquery.placeholder.js"></script>
<script src="http://vjs.zencdn.net/c/video.js"></script>
<script src="js/application.js"></script>
<!--[if lt IE 8]><script src="js/icon-font-ie7.js"></script><script src="js/icon-font-ie7-24.js"></script><![endif]-->
</body>
</html>
EOD;
echo $frm;
}
?>
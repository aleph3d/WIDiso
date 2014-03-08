<?php
// FILE: runMiniMediaClientCall (part of WIDiso,
// https://github.com/aleph3d/WIDiso.git)
// TYPE: a file to be called to run the API of HTML5-based Server Website (PHP5)
// LICENSE: MIT (Copyright 2014 Hannah Dunitz)
proCheck() or die();
unset($itx);
include(pathPrivate."libraries/dbLIB.php");
include(pathPrivate."libraries/systemLIB.php");
include(pathPrivate."config/localization/".defLang."/systemLang.php");
$DO = new mmClass();
$_SESSION = $DO->initSession($_SESSION);
$_SESSION = $DO->agentSession($_SESSION,$_SERVER['HTTP_USER_AGENT']);
$itx['get'] = safeGet($_GET);
define('unixtime',time());
define('prettytime',$DO->getPrettyTime(unixtime,deftimezone));
if (!$DO->validateUser()) {
//User is not valid - define the validUser to false ouput to login screen.
define('validUser',FALSE);
}
else {
//User IS valid - define the validUser to true ouput to login screen.
define('validUser',TRUE);
}
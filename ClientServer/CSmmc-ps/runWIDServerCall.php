<?php
// FILE: runWIDisoCall (part of WIDiso, https://github.com/aleph3d/WIDiso.git)
// TYPE: a file to be called to run the API of HTML5-based MiniMediaClient (PHP5)
// LICENSE: MIT (Copyright 2014 Hannah Dunitz)
proCheck() or die();
unset($itx);
include(pathPrivate."libraries/systemLIB.php");
include(pathPrivate."config/localization/".defLang."/systemLang.php");
$DO = new mmClass();

if (!$DO->validateUser()) {
//User is not valid - define the validUser to false ouput to login screen.
define('validUser',FALSE);
}
else {
//User IS valid - define the validUser to true ouput to login screen.
define('validUser',TRUE);
}
<?php

$relRoot = dirname($_SERVER['SCRIPT_NAME']);
define('RootREL', $relRoot);
define('ControllerREL', 'controllers/');

define('RootURI', dirname($_SERVER['SCRIPT_FILENAME'])."/");
define('UploadREL', 'upload/');
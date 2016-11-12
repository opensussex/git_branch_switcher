<?php

ini_set('display_errors',1);
ini_set('error_reporting', E_ALL);

	// database connectivity 
define('DB_HOST','localhost');
define('DB_NAME','db_name');
define('DB_USERNAME','root');
define('DB_PASSWORD','root');


define('CONTROLLER_DIR','controllers/');
define('CONTROLLER_SUFFIX','.class.php');
define('VIEW_DIR','views/');
define('VIEW_SUFFIX','.view.php');
define('MODEL_DIR','models/');
define('MODEL_SUFFIX','.class.php');

define('CORE_DIR','../wark_core/');
define('DEPLOY_DIR','/var/www/app/');

define('PRODUCTION',false);
?>

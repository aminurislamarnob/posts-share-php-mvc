<?php
//load config
require_once 'config/config.php';

//include helpers
require_once 'helpers/url_helpers.php';
require_once 'helpers/session_helpers.php';
require_once 'helpers/formate_helpers.php';

//load libraries
spl_autoload_register(function($clases){
    require_once 'libraries/'. $clases .'.php';
});

?>
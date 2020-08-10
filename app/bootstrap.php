<?php
//load config
require_once 'config/config.php';

//load libraries
spl_autoload_register(function($clases){
    require_once 'libraries/'. $clases .'.php';
});

?>
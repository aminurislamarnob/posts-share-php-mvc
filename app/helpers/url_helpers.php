<?php
//simple url redirect
function redirect($page){
    header('Location: ' . URL_ROOT . '/' . $page);
}
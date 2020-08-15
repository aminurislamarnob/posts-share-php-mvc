<?php
session_start();

//Flash message helper
//Example: flash('register_success', 'You are now registered');
//Display in view: echo flash('register_success');
function flash($name = '', $message = '', $class = 'alert alert-success'){
    if(!empty($name)){
        if(!empty($message) && empty($_SESSION[$name])){ //set session if have message and sesssion name
            
            //if session class not empty
            if(!empty($_SESSION[$name.'_class'])){
                unset($_SESSION[$name.'_class']);
            }

            $_SESSION[$name] = $message;
            $_SESSION[$name.'_class'] = $class;

        }elseif(empty($message) && !empty($name) && !empty($_SESSION[$name])){

            $class = !empty($_SESSION[$name.'_class']) ? $_SESSION[$name.'_class'] : '';
            echo '<div class="'.$class.'">'.$_SESSION[$name].'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            
            //destroy session name and session class
            unset($_SESSION[$name]);
            unset($_SESSION[$name.'_class']);
        }
    }
}


//check user logged in

function isLoggedIn(){
    if(isset($_SESSION['user_id'])){
        return true;
    }else{
        return false;
    }
}
<?php
class Users extends Controller{

    public function __construct(){
        $this->userModel = $this->model('User');
    }

    public function register(){
        if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
            //sanitize post
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //Init data
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            //check name validation
            if(empty($_POST['name'])){
                $data['name_err'] = 'please enter name';
            }

            //check email validation
            if(empty($_POST['email'])){
                $data['email_err'] = 'please enter email';
            }else{
                if($this->userModel->findUserByEmail($_POST['email'])){
                    $data['email_err'] = 'Email already exists!';
                }
            }

            //check password validation
            if(empty($_POST['password'])){
                $data['password_err'] = 'please enter password';
            }elseif(strlen($_POST['password']) < 6){
                $data['password_err'] = 'password must be atlist 6 character';
            }

            //check confirm password validation
            if(empty($_POST['confirm_password'])){
                $data['confirm_password_err'] = 'please enter confirm password';
            }elseif( $_POST['password'] != $_POST['confirm_password'] ){
                $data['confirm_password_err'] = 'password and confirm password field not match!';
            }

            //make sure errors are empty
            if( empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) ){
                //validated
                
                //password hash
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //register feedback
                if( $this->userModel->register($data) ){
                    flash('register_success', 'You are successfully registered!');
                    redirect('users/login');
                }else{
                    die('Something went wrong.');
                }
            }else{
                //load view with error
                $this->view('users/register', $data);
            }

        }else{
            //Init Post
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            //load view
            $this->view('users/register', $data);
        }
    }

    public function login(){
        if( $_SERVER['REQUEST_METHOD'] == 'POST' ){

            //sanitize post
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //Init data
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => ''
            ];

            //check email validation
            if(empty($_POST['email'])){
                $data['email_err'] = 'please enter email';
            }
            
            //check password validation
            if(empty($_POST['password'])){
                $data['password_err'] = 'please enter password';
            }

            //check for user email
            if($this->userModel->findUserByEmail($_POST['email'])){
                //email found
            }else{
                $data['email_err'] = 'No user found.';
            }

            //make sure errors are empty
            if( empty($data['email_err']) && empty($data['password_err']) ){
                //validated
                //check and set logged in user
                $loggedInUser = $this->userModel->login($_POST['email'], $_POST['password']);
                if($loggedInUser){
                    //session set
                    $this->createUserSession($loggedInUser);
                }else{
                    $data['password_err'] = "Password not correct."; 
                    $this->view('users/login', $data);
                }
            }else{
                //load view with error
                $this->view('users/login', $data);
            }

        }else{
            //Init post
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            //load view
            $this->view('users/login', $data);
        }
    }

    //create user session
    public function createUserSession($row){
        $_SESSION['user_id'] = $row->id;
        $_SESSION['user_email'] = $row->email;
        $_SESSION['user_name'] = $row->name;

        //set success message
        flash('login_success', 'You are successfully loggedin!');
        //redirect home page
        redirect('posts');
    }

    //user logout
    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_email']);
        
        //destroy session
        session_destroy();

        //redirect login page
        redirect('users/login');
    }
}
<?php
class Pages extends Controller{
    public function __construct(){
        //check user logged in
        if(isLoggedIn()){
            redirect('posts');
        }   
    }

    public function index(){
        $data = [
            'title' => 'Shareposts',
            'description' => 'This is a share posts application made by php oop mvc.'
        ];
        $this->view('pages/index', $data);
    }

    public function about(){
        $data = [
            'title' => 'About Us'
        ];

        $this->view('pages/about', $data);
    }
}
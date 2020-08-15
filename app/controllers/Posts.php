<?php
class Posts extends Controller{
    public function __construct(){

        //check user logged in
        if(!isLoggedIn()){
            redirect('users/login');
        }

        //instance of posts modal
        $this->postsModel = $this->model('Post');
    }

    public function index(){
        $postsData = $this->postsModel->getAllPosts();
        $data = [
            'posts' => $postsData
        ];

        //load view
        $this->view('posts/index', $data);
    }

    //insert post
    public function add(){
        if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
            //sanitize post
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //Init data
            $data = [
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'author_id' => $_SESSION['user_id'],
                'title_err' => '',
                'body_err' => '',
            ];

            //check title validation
            if(empty($_POST['title'])){
                $data['title_err'] = 'Please enter title';
            }

            //check body validation
            if(empty($_POST['body'])){
                $data['body_err'] = 'Please enter body text';
            }

            if( empty($data['title_err']) && empty($data['body_err']) ){
                if( $this->postsModel->add($data) ){
                    flash('post_success', 'Post successfully added!');
                    redirect('posts');
                }else{
                    die('Something went wrong.');
                }
            }else{
                //load view with error
                $this->view('posts/add', $data);
            }

        }else{
            $data = [
                'title' => '',
                'body' => ''
            ];

            //load view
            $this->view('posts/add', $data);
        }
    }

    //show post on single page
    public function show($id){
        $post = $this->postsModel->getPostById($id);
        $author = $this->postsModel->getUserById($post->author_id);
        $data = [
            'post' => $post,
            'author' => $author
        ];

        //load view
        $this->view('posts/show', $data);
    }


    //update post
    public function edit($id){
        if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
            //sanitize post
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //Init data
            $data = [
                'id' => $id,
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'title_err' => '',
                'body_err' => '',
            ];

            //check title validation
            if(empty($_POST['title'])){
                $data['title_err'] = 'Please enter title';
            }

            //check body validation
            if(empty($_POST['body'])){
                $data['body_err'] = 'Please enter body text';
            }

            if( empty($data['title_err']) && empty($data['body_err']) ){
                if( $this->postsModel->updatePost($data) ){
                    flash('post_success', 'Post successfully updated!');
                    redirect('posts');
                }else{
                    die('Something went wrong.');
                }
            }else{
                //load view with error
                $this->view('posts/edit', $data);
            }

        }else{

            //get post by id
            $post = $this->postsModel->getPostById($id);

            //check author post
            if($post->author_id != $_SESSION['user_id']){
                redirect('posts');
            }

            $data = [
                'id' => $post->id,
                'title' => $post->title,
                'body' => $post->body
            ];

            //load view
            $this->view('posts/edit', $data);
        }
    }


    //delete post
    public function delete($id){

        if( $_SERVER['REQUEST_METHOD'] == 'POST' ){

            //check author post
            $post = $this->postsModel->getPostById($id);
            if($post->author_id != $_SESSION['user_id']){
                redirect('posts');
            }else{
                //delete post by id
                if($this->postsModel->deletePostById($id)){
                    flash('post_success', 'Post successfully deleted!');
                    redirect('posts');
                }else{
                    die("Something went wrong.");
                }
            }

            
        }else{
           //load view
           $this->view('posts'); 
        }
    }

}
<?php
class Post{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    //get all post
    public function getAllPosts(){
        $this->db->query("SELECT *, 
                        posts.id AS postId, users.id AS userId, posts.created_at AS postCreatedAt
                        FROM posts LEFT JOIN users 
                        ON posts.author_id = users.id 
                        ORDER BY posts.created_at DESC");

        $result = $this->db->resultSet();
        return $result;
    }

    //add post
    public function add($data){
        //insert post
        $this->db->query("INSERT INTO posts(title, body, author_id) VALUES(:title, :body, :author_id)");
        
        //bind values
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':author_id', $data['author_id']);

        //execute query
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    //get post by id
    public function getPostById($id){
        $this->db->query("SELECT * FROM posts WHERE id = :id");

        //bind value
        $this->db->bind(':id', $id);

        //get single row value
        $row = $this->db->singleResult();
        return $row;
    }

    //get post author by id
    public function getUserById($id){
        $this->db->query("SELECT * FROM users WHERE id = :id");

        //bind value
        $this->db->bind(':id', $id);

        //get single row value
        $row = $this->db->singleResult();
        return $row;
    }

    //update post
    public function updatePost($data){
        //insert post
        $this->db->query("UPDATE posts SET title = :title, body = :body WHERE id = :id");
        
        //bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);

        //execute query
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    //delete post
    public function deletePostById($id){
        //insert post
        $this->db->query("DELETE FROM posts WHERE id = :id");
        
        //bind values
        $this->db->bind(':id', $id);

        //execute query
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

}
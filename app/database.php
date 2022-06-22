<?php
namespace App;
class Database{
    public $connect;
    function __construct(){
        $this->connect = mysqli_connect('localhost', 'tmwag', '98425', 'encyclopediaDRG');
    }
    function first_res($query){
        $result = mysqli_query($this->connect, $query);
        return mysqli_fetch_row($result);
    }
    function all_res($query){
        $result = mysqli_query($this->connect, $query);
        return mysqli_fetch_all($result);
    }
    function in_db($query){
        $result = mysqli_query($this->connect, $query);
        return mysqli_num_rows($result);
    }
    function query($query){
        mysqli_query($this->connect, $query);
        return;
    }
    function article_count($user_id){
        $articles = mysqli_query($this->connect, "SELECT * FROM articles WHERE author = '{$user_id}'");
        return $articles->field_count;
    }
    function alter_role($user, $role){
        mysqli_query($this->connect,"UPDATE users SET role = '{$role}' where id = '{$user}'");
        return;
    }
}
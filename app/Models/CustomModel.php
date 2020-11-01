<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class CustomModel{

    protected $db;

    public function __construct(ConnectionInterface &$db){
        $this->db =& $db;
    }

    function all(){

        return $this->db->table('posts')->get()->getResult();

    }

    function where(){
        
        return $this->db->table('posts')
                 ->where(['post_id >'=>20])
                 ->where(['post_id <'=>25])
                 ->where(['post_id !='=>21])
                 ->orderBy('post_id','DESC')
            //   ->orderBy('post_id','ACS')
                 ->get()
                 ->getRow() ;
    }

    function join(){
        
        return $this->db->table('posts')
                 ->where('post_id >', 50)
                 ->where('post_id <', 60)
                 ->join('users','posts.post_author = users.user_id')
                 ->get()
                 ->getResult() ;
    }

    function like(){
        
        return $this->db->table('posts')
                 ->like('post_content', 'love','both') //%string
                 ->join('users','posts.post_author = users.user_id')
                 ->get()
                 ->getResult() ;
    }

    function grouping(){
        //SELECT * FROM posts where (post_id = 25 AND post_data < '1990-01-01 00:00:00') OR post_author = 10;

        return $this->db->table('posts')
                        ->groupStart()
                        ->where(['post_id >' => 25, 'post_created_at <' => '1990-01-01 00:00:00']) //%string% %string,string%
                        ->groupEnd()
                        ->orWhere('post_author', 10)
                        ->join('users','posts.post_author = users.user_id')
                        ->get()
                        ->getResult() ;
    }

    function wherein(){
       
        $emails = ['rgutmann@example.com','rgutmann@example.com','rgutmann@example.com'];
        return $this->db->table('posts')
                        ->groupStart()
                        ->where(['post_id >' => 25, 'post_created_at <' => '1990-01-01 00:00:00']) //%string% %string,string%
                        ->groupEnd()
                        ->orWhereIn('email', $emails)
                        ->join('users','posts.post_author = users.user_id')
                        ->limit(5,5)
                        ->get()
                        ->getResult() ;
    }

    function getPosts(){
        $builder = $this->db->table('posts');
        $builder->join('users', 'posts.post_author = users.user_id');
        $posts = $builder->get()->getResult();
        return $posts;
    }

}
<?php
//CLASES ADMIN
class User{
    private $user;
    private $data;
    public function __construct(){
        $this->user = array();
    }
    //PROTOTYPE: Array get_users()
    //retrieves all data from json
    public function get_users(){
        $json = file_get_contents("./config/db.json");
        $result = json_decode($json, true);
        $t = count($result);
        for ($i=0; $i < $t; $i++) { 
           $data[] = $result[$i];
        }            
        return $data;
    }
    //PROTOTYPE: Login control($email)
    //compare login data by email
    public function user_login($email){
        $json = file_get_contents("./config/db.json");
        $result = json_decode($json, true);
        $t = count($result);
        for ($i=0; $i < $t; $i++) { 
           $data[] = $result[$i];
        }  
        if($data){
            foreach($data as $result){
                if($result["user_email"] == $email){
                    return $result;
                }
            }
        }else{
            return false;
        }
    }
    //PROTOTYPE: clean string($string)s
    //clean login form data
    public function clean_string($string){
        $str = htmlspecialchars($string);
        return $str;        
    }
}
?>
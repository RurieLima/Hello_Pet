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
    //PROTOTYPE: Array get_users_dash($email)
    //retrieves all data from json, remove user login
    public function get_users_dash($email){
        $users = $this->get_users();
        $t = count($users);
        for ($i=0; $i < $t; $i++) { 
            if($users[$i]["user_email"] != $email){
                $data[] = $users[$i];
            }
        }  
        return $data;             
    }
    //PROTOTYPE: Array get_male($email)
    //retrieves users male data from json
    public function get_male($email){
        $users = $this->get_users();
        $t = count($users);
        for ($i=0; $i < $t; $i++) { 
            if($users[$i]["user_email"] != $email){
                $data[] = $users[$i];
            }
        }  
        if($data){
            foreach($data as $result){
                if($result["user_gender"] === "Male"){
                    $alldata[] = $result;
                }
            }
            return $alldata;
        }else{
            return false;
        }            
    }
    //PROTOTYPE: Array get_female($email)
    //retrieves users female data from json
    public function get_female($email){
        $users = $this->get_users();
        $t = count($users);
        for ($i=0; $i < $t; $i++) { 
            if($users[$i]["user_email"] != $email){
                $data[] = $users[$i];
            }
        }  
        if($data){
            foreach($data as $result){
                if($result["user_gender"] === "Female"){
                    $alldata[] = $result;
                }
            }
            return $alldata;
        }else{
            return false;
        }            
    }
    //PROTOTYPE: Array get_favorite($email)
    //retrieves users favorite data from json
    public function get_favorite($email){
        $users = $this->get_users();
        $x = count($users);
        for ($i=0; $i < $x; $i++) { 
            if($users[$i]["user_email"] != $email){
                $data[] = $users[$i];
            }
        }  
        $favorite = $_SESSION["favorite"];
        $t = count($favorite);
        if($t > 0){
            foreach($data as $result){
                for($i=0;$i<$t;$i++){
                    if($favorite[$i] == $result["user_email"]){
                        $allData[] = $result;
                    }  
                }    
            }
            return $allData;
        }else{
            return false;
        }       
    }
    //PROTOTYPE: Array get_city()
    //retrieves users city data from json
    public function get_city($email,$city){
        $users = $this->get_users();
        $x = count($users);
        for ($i=0; $i < $x; $i++) { 
            if($users[$i]["user_email"] != $email){
                $data[] = $users[$i];
            }
        }  
        if($data){
             foreach($data as $result){
                 if(str_contains($result["user_city"], $city)){
                     $allData[] = $result; 
                 }
             }
         }       
         if(!empty($allData)){
            return $allData;
         }else{
            return false;
         }
    }  
    //PROTOTYPE: Array get_pet_info($email)
    //retrieves all data from json, remove user login
    public function get_pet_info($name){
        $users = $this->get_users();
        $t = count($users);
        for ($i=0; $i < $t; $i++) { 
            if($users[$i]["user_name"] == $name){
                $data[] = $users[$i];
            }
        }  
        return $data;             
    }
    //PROTOTYPE: Login control($email)
    //compare login data by email
    public function user_login($email, $name){
        $result = $this->get_users();
        $t = count($result);
        for ($i=0; $i < $t; $i++) { 
           $data[] = $result[$i];
        }  
        if($data){
            foreach($data as $result){
                if($result["user_email"] == $email && $result["user_name"] == $name){
                    return $result;
                }
            }
        }else{
            return false;
        }
    }
    //PROTOTYPE: Login control($email)
    //compare login data by email
    public function get_user_by_id($id){
        $result = $this->get_users();
        $t = count($result);
        for ($i=0; $i < $t; $i++) { 
           $data[] = $result[$i];
        }  
        if($data){
            foreach($data as $result){
                if($result["user_id"] == $id){
                    return $result;
                }
            }
        }else{
            return false;
        }
    }    
    //PROTOTIPO: boolean register_user($datos)
    //insert a new user 
    public function register_user($newUser){
        //open json data
        $result = $this->get_users();
        $t = count($result);
        for ($i=0; $i < $t; $i++) { 
           $data[] = $result[$i];
        }  
        //append array data user
        $data[] = $newUser;        
        //encode back to json
        $data = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents("./config/db.json", $data);
        if($data){
            return true;
        }else{
            return false;
        }
    }
    //PROTOTYPE: update datar by id($array, $id)
    //update data user 
    public function update_user($array, $id){
        //open json data
        $result = $this->get_users();
        $t = count($result);
        for ($i=0; $i < $t; $i++) {       
            //update array data user
            $datoEdit["user_id"] = $id;
            if($result[$i]["user_id"] != $id){
                $dato[] = $result[$i];
            }else{                
                foreach($array as $data => $d){
                    if(!empty($array[$data])){
                        $datoEdit[$data] = $array[$data];
                    }else{
                        $datoEdit[$data] = $d;
                    }
                }
                $dato[] = $datoEdit;
            }      
        }  
        //encode back to json
        $dato = json_encode($dato, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents("./config/db.json", $dato);
        if($dato){
            return $dato;
        }else{
            return false;
        }      
    }     
    //boolean delete_user_by_id($id)
    //delete user by id from json 
    public function delete_user($id){
         //open json data
         $result = $this->get_users();
         $t = count($result);
         for ($i=0; $i < $t; $i++) { 
            $data[] = $result[$i];
         }  
        //remove array data user
        if($data){
            foreach($data as $result){
                if($result["user_id"] != $id){
                    $dato[] = $result;
                }
            }
        }   
       //encode back to json
       $dato = json_encode($dato, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
       file_put_contents("./config/db.json", $dato);
       if($dato){
           return true;
       }else{
           return false;
       }
    } 
    //boolean delete_data_gallery($dataDelete)
    //delete data gallery from json 
    public function delete_data_gallery($dataDelete){
       //open json data       
       //remove data gallery array 
        $dataGallery = $_SESSION["gallery"];
        foreach ($dataGallery as $key => $value) {
            if($value == $dataDelete){
                unset($dataGallery[$key]);
            }else{
                $array[] = $value;
                $_SESSION["test"] = $array;
            }
        }
        $_SESSION["gallery"] = $array;               
        return  $array;     
   } 
    //PROTOTYPE: Array get_favorite_data($email)
    //retrieves favorite data from json
    public function get_favorite_data($email, $array){
        $emailFavorite = $_SESSION["favorite"];
        $t = count($emailFavorite);
        if($t > 0){
            for ($i=0; $i < $t; $i++){ 
                if($emailFavorite[$i] == $email){
                     //delete favorite 
                     unset($emailFavorite[$i]);
                     $id = $_SESSION["id"];
                     $array["user_favorite"] = array_values($emailFavorite);                    
                     //update array data user
                     $result = $this->update_user($array, $id);   
                     $_SESSION["favorite"] = array_values($array["user_favorite"]);
                     break;
                 }else{
                    //insert favorite
                    if(!in_array($email, $emailFavorite)){
                        $id = $_SESSION["id"];
                        $emailFavorite[] = $email;
                        $array["user_favorite"] = $emailFavorite;
                        $result = $this->update_user($array, $id);   
                        $_SESSION["favorite"] = $array["user_favorite"];
                        break;
                    }
                }    
            } 
        }else{
            //insert favorite
            $id = $_SESSION["id"];
            $emailFavorite[] = $email;
            $array["user_favorite"] = $emailFavorite;
            $result = $this->update_user($array, $id);   
            $_SESSION["favorite"] = $array["user_favorite"];
        }        
        return $result;
    }
    //PROTOTYPE: isset id($int)
    //retrieves all id data from json 
    public function get_new_id(){
        $newId = 1;
        $users = $this->get_users();
        foreach($users as $result){
            $ids[] = $result["user_id"];
        }
        $t = count($ids);
        for($i=0;$i<$t;$i++){
            if(in_array($newId, $ids)){
                $newId++;
            }  
        }
        return $newId;
    }
    //PROTOTYPE: clean string($string)s
    //clean login form data
    public function clean_string($string){
        $str = htmlspecialchars($string);
        return $str;        
    }
}
?>
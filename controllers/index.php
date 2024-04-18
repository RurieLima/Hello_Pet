<?php  
session_start();
require_once("models/index.php");
//CLASS ADMIN
class userController{
    private $model;
    public function __construct(){
        $this->model = new User();
    }
    //show dash view
    static function index(){
        $user = new User();
        if(!empty($_SESSION["login"])){
            $allData = $user->get_users_dash($_SESSION["email"]);
            if($allData){
                require_once("views/dash.php"); 
            }else{
                $_SESSION["msg"] = "No pet";
                $_SESSION["msgClass"] = "has-text-danger";
                require_once("views/dash.php"); 
            }         
        }else{
            require_once("views/index.php");
        }
    }
    //show male users from dash view 
    static function male(){
        $user = new User();
        if(!empty($_SESSION["login"])){
            $allData = $user->get_male($_SESSION["email"]);
            if($allData){
                require_once("views/dash.php"); 
            }else{
                $_SESSION["msg"] = "No male pet";
                $_SESSION["msgClass"] = "has-text-danger";
                require_once("views/dash.php"); 
            }         
        }else{
            require_once("views/index.php");
        }
    }
    //show female users from dash view
    static function female(){
        $user = new User();
        if(!empty($_SESSION["login"])){
            $allData = $user->get_female($_SESSION["email"]);
            if($allData){
                require_once("views/dash.php"); 
            }else{
                $_SESSION["msg"] = "No female pet";
                $_SESSION["msgClass"] = "has-text-danger";
                require_once("views/dash.php"); 
            }          
        }else{
            require_once("views/index.php");
        }
    }
    //show favorite users from dash view
    static function favorite(){
        $user = new User();
        if(!empty($_SESSION["login"])){
            $allData = $user->get_favorite($_SESSION["email"]);
            if($allData){
                require_once("views/dash.php"); 
            }else{
                $_SESSION["msg"] = "No favorite pet";
                $_SESSION["msgClass"] = "has-text-danger";
                require_once("views/dash.php"); 
            }          
        }else{
            require_once("views/index.php");
        }
    }
    //show city users from dash view
    static function city(){
        $user = new User();
        if(!empty($_SESSION["login"])){
            if(!empty($_REQUEST["find_city"])){
                $city = $user->clean_string(strtolower($_REQUEST["find_city"]));
                $city = ucfirst($city);
                $allData = $user->get_city($_SESSION["email"], $city);
                if($allData){
                    require_once("views/dash.php"); 
                }else{
                    $_SESSION["msg"] = "There is no pet";
                    $_SESSION["msgClass"] = "has-text-danger";
                    require_once("views/dash.php"); 
                }
            }else{
                $_SESSION["msg"] = "Insert city name";
                $_SESSION["msgClass"] = "has-text-danger";
                require_once("views/dash.php");
            }
        }else{
            require_once("views/index.php");
        }
    }
    //show view info Pet
    static function info(){
        $user = new User();
        if(!empty($_GET["m"]) && !empty($_GET["email"])){
            $email = $user->clean_string($_REQUEST["email"]);
            $petData = $user->get_pet_info($email);        
            require_once("views/info.php");
        }       
    }
    //insert / delete favorite users from json 
    static function is_favorite(){
         $user = new User();
         if(!empty($_GET["m"]) && !empty($_GET["email"])){
             $email = $user->clean_string($_GET["email"]);
             //data user
             $array["user_email"] = $_SESSION["email"];
             $array["user_name"] = $_SESSION["name"];
             $array["user_city"] = $_SESSION["city"];
             $array["user_breed"] = $_SESSION["breed"];
             $array["user_gender"] = $_SESSION["gender"];
             $array["user_img"] = $_SESSION["img"];
             $array["user_favorite"] = $_SESSION["favorite"];
             $array["user_gallery"] = $_SESSION["gallery"];
             $array["user_like"] = $_SESSION["like"];
             $favoriteData = $user->get_favorite_data($email, $array);                
             $allData = $user->get_users_dash($_SESSION["email"]);
             header('Location: http://localhost/hello_pet/index.php');
         }else{
             require_once("views/index.php");
         }
    }
       //insert / delete like users from json 
       static function is_like(){
        $user = new User();
        if(!empty($_GET["m"]) && !empty($_GET["id"])){
            $idPet = $user->clean_string($_GET["id"]);
            //request user like
            $dataPet = $user->get_user_by_id($idPet);
            $likeData = $user->add_like($dataPet, $idPet);                
            $allData = $user->get_users_dash($_SESSION["email"]);
            header('Location: http://localhost/hello_pet/index.php');
        }else{
            require_once("views/index.php");
        }
   }
    //show view administrator
    static function admin(){
        $user = new User();
        $data = $user->get_users();
        require_once("views/admin.php");
    }
     //Login request show view dash
     static function login(){
        $user = new User();
        if(!empty($_REQUEST["user_login"])){
            if(!empty($_REQUEST["user_email"]) && !empty($_REQUEST["user_name"])){
                $email = $user->clean_string($_REQUEST["user_email"]);
                $name = $user->clean_string($_REQUEST["user_name"]);
                $data = $user->user_login($email, $name);
                if($data){
                    $_SESSION["email"] = $email;
                    $_SESSION["id"] = $data["user_id"];
                    $_SESSION["name"] = $data["user_name"];
                    $_SESSION["city"] = $data["user_city"];
                    $_SESSION["breed"] = $data["user_breed"];
                    $_SESSION["gender"] = $data["user_gender"];
                    $_SESSION["img"] = $data["user_img"];
                    $_SESSION["favorite"] = $data["user_favorite"];
                    $_SESSION["gallery"] = $data["user_gallery"];
                    $_SESSION["like"] = $data["user_like"];
                    $_SESSION["login"] = "login_true";
                    $allData = $user->get_users_dash($email);
                    require_once("views/dash.php");                             
                }else{
                    $_SESSION["msg"] = "Not accessible";
                    $_SESSION['msgClass'] = "has-text-danger"; 
                    header("location:http://localhost/hello_pet/index.php");
                }                        
            }else{
                $_SESSION["msg"] = "Please fill in user email and user name";
                $_SESSION['msgClass'] = "has-text-danger"; 
                header("location:http://localhost/hello_pet/index.php");
            }
        }
     }
    //show view profile
    static function profile(){
        require_once("views/profile.php");
    }
    //show view gallery
    static function gallery(){
        require_once("views/gallery.php");
    }
    //show view register
    static function register(){
        require_once("views/register.php");
    }
    //show view edit
    static function edit(){
        $id = $_REQUEST["id"];
        $user = new User();
        $data = $user->get_users();
        $dato = $user->get_user_by_id($id);
        require_once("views/edit.php");
    }
    //show view new user 
    static function insert(){
    require_once("views/insertuser.php");
    }
    //save user 
    static function save(){       
        $user = new User();
        if(!empty($_POST["user_save"])){
            if(!empty($_POST["email"]) && !empty($_POST["name"]) && !empty($_POST["breed"]) && !empty($_POST["city"]) && !empty($_POST["gender"])){
                $newUser["user_id"] = $user->get_new_id(); 
                $newUser["user_email"] = $user->clean_string(strtolower($_POST["email"]));
                $newUser["user_name"] = $user->clean_string(ucfirst(strtolower($_POST["name"])));
                $newUser["user_breed"] = $user->clean_string($_POST["breed"]);
                $newUser["user_city"] = $user->clean_string(ucfirst(strtolower($_POST["city"])));
                $newUser["user_gender"] = $user->clean_string(ucfirst(strtolower($_POST["gender"])));
                if(!empty($_FILES["file"]["name"])){
                    $newUser["user_img"] = $_FILES["file"]["name"];
                }else{
                    $newUser["user_img"] = $_POST["userImgNew"];
                }
                $newUser["user_favorite"] = [];
                $newUser["user_gallery"] = [];
                $newUser["user_like"] = 0;
                $data = $user->register_user($newUser);
                //saving file imgs
                if($data){
                    $archivo = $_FILES['file']['name'];
                    if (isset($archivo) && $archivo != ""){
                        $type = $_FILES['file']['type'];
                        $size = $_FILES['file']['size'];
                        $temp = $_FILES['file']['tmp_name'];
                        if (!((strpos($type, "gif") || strpos($type, "jpeg") || strpos($type, "jpg") || strpos($type, "png")) && ($size < 2000000))){
                            $_SESSION["msg"] = "Only .gif, .jpg, .png files are allowed. and 200 kb maximum";
                            $_SESSION["msgClass"] = "has-text-danger";
                        }else{
                            if (move_uploaded_file($temp, 'views/img/'.$archivo)){
                                chmod('views/images/'.$archivo, 0777);
                            }else{
                                $_SESSION["msg"] = "Error uploading file";
                                $_SESSION["msgClass"] = "has-text-danger";
                            }
                        }
                    }
                }
                header("location:http://localhost/hello_pet/index.php?m=admin"); 
            }else{
                $_SESSION["msg"] = "Please fill out all fields";
                $_SESSION['msgClass'] = "has-text-danger"; 
                header("location:http://localhost/hello_pet/index.php?m=insert");
            }
        }
    }
    //save register user 
    static function save_register(){       
        $user = new User();
       if(!empty($_POST["register_save"])){
            if(!empty($_POST["email"]) && !empty($_POST["name"]) && !empty($_POST["breed"]) && !empty($_POST["city"]) && !empty($_POST["gender"])){
                $newUser["user_id"] = $user->get_new_id(); 
                $newUser["user_email"] = $user->clean_string(strtolower($_POST["email"]));
                $newUser["user_name"] = $user->clean_string(ucfirst(strtolower($_POST["name"])));
                $newUser["user_breed"] = $user->clean_string($_POST["breed"]);
                $newUser["user_city"] = $user->clean_string(ucfirst(strtolower($_POST["city"])));
                $newUser["user_gender"] = $user->clean_string(ucfirst(strtolower($_POST["gender"])));
                if(!empty($_FILES["file"]["name"])){
                    $newUser["user_img"] = $_FILES["file"]["name"];
                }else{
                    $newUser["user_img"] = $_POST["userImgNew"];
                }
                $newUser["user_favorite"] = [];
                $newUser["user_gallery"] = [];
                $newUser["user_like"] = 0;
                $data = $user->register_user($newUser);
                //saving file imgs
                if($data){
                    $archivo = $_FILES['file']['name'];
                    if (isset($archivo) && $archivo != ""){
                        $type = $_FILES['file']['type'];
                        $size = $_FILES['file']['size'];
                        $temp = $_FILES['file']['tmp_name'];
                        if (!((strpos($type, "gif") || strpos($type, "jpeg") || strpos($type, "jpg") || strpos($type, "png")) && ($size < 2000000))){
                            $_SESSION["msg"] = "Only .gif, .jpg, .png files are allowed. and 200 kb maximum";
                            $_SESSION["msgClass"] = "has-text-danger";
                        }else{
                            if (move_uploaded_file($temp, 'views/img/'.$archivo)){
                                chmod('views/images/'.$archivo, 0777);
                            }else{
                                $_SESSION["msg"] = "Error uploading file";
                                $_SESSION["msgClass"] = "has-text-danger";
                            }
                        }
                    }
                    $_SESSION["msg"] = "Registration successfully";
                    $_SESSION["msgClass"] = "has-text-success";
                }                
                header("location:http://localhost/hello_pet/index.php"); 
            }else{
                $_SESSION["msg"] = "Please fill out all fields";
                $_SESSION["msgClass"] = "has-text-danger";
                header("location:http://localhost/hello_pet/index.php?m=register");
            }
        }
    }
     //save profile user 
     static function save_profile(){       
        $user = new User();
       if(!empty($_POST["profile_save"])){
            if(!empty($_POST["email"]) && !empty($_POST["name"]) && !empty($_POST["breed"]) && !empty($_POST["city"]) && !empty($_POST["gender"])){
                $id = $user->clean_string($_POST["id"]);
                $array["user_name"] = $user->clean_string(ucfirst(strtolower($_POST["name"])));
                $array["user_email"] = $user->clean_string(strtolower($_POST["email"]));
                $array["user_breed"] = $user->clean_string($_POST["breed"]);
                $array["user_city"] = $user->clean_string(ucfirst(strtolower($_POST["city"])));
                $array["user_gender"] = $user->clean_string(ucfirst(strtolower($_POST["gender"])));
                if(!empty($_FILES["file"]["name"])){
                    $array["user_img"] = $_FILES["file"]["name"];
                }else{
                    $array["user_img"] = $_POST["updateImgUser"];
                }
                $array["user_favorite"] = $_SESSION["favorite"];
                $array["user_gallery"] = $_SESSION["gallery"];
                $array["user_like"] = $_SESSION["like"];
                $data = $user->update_user($array, $id);
                if($data){
                    //saving file imgs
                    $archivo = $_FILES['file']['name'];
                    if (isset($archivo) && $archivo != ""){
                        $type = $_FILES['file']['type'];
                        $size = $_FILES['file']['size'];
                        $temp = $_FILES['file']['tmp_name'];
                        if (!((strpos($type, "gif") || strpos($type, "jpeg") || strpos($type, "jpg") || strpos($type, "png")) && ($size < 2000000))){
                            $_SESSION["msg"] = "Only .gif, .jpg, .png files are allowed. and 200 kb maximum";
                            $_SESSION["msgClass"] = "has-text-danger";
                        }else{
                            if (move_uploaded_file($temp, 'views/img/'.$archivo)){
                                chmod('views/images/'.$archivo, 0777);
                            }else{
                                $_SESSION["msg"] = "Error uploading file";
                                $_SESSION["msgClass"] = "has-text-danger";
                            }
                        }
                    }
                    $_SESSION["email"] = $array["user_email"];
                    $_SESSION["name"] = $array["user_name"];
                    $_SESSION["city"] = $array["user_city"];
                    $_SESSION["breed"] = $array["user_breed"];
                    $_SESSION["gender"] = $array["user_gender"];
                    $_SESSION["img"] = $array["user_img"];
                    $_SESSION["favorite"] = $array["user_favorite"];
                    $_SESSION["gallery"] = $array["user_gallery"];
                    $_SESSION["like"] = $array["user_like"];
                }
                $_SESSION["msg"] = "Data updated success";
                $_SESSION['msgClass'] = "has-text-success"; 
                header("location:http://localhost/hello_pet/index.php?m=profile"); 
           }else{
               $_SESSION["msg"] = "Please fill out all fields";
               $_SESSION['msgClass'] = "has-text-danger"; 
               header("location:http://localhost/hello_pet/index.php?m=profile");
           }
        }
    }
    //save galery user
     static function save_gallery(){       
        $user = new User();
       if(!empty($_POST["gallery_save"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
            $id = $_SESSION["id"];
            $array["user_name"] = $_SESSION["name"];
            $array["user_email"] = $_SESSION["email"];
            $array["user_breed"] = $_SESSION["breed"];
            $array["user_city"] = $_SESSION["city"];
            $array["user_gender"] = $_SESSION["gender"];
            $array["user_img"] = $_SESSION["img"];
            $array["user_favorite"] = $_SESSION["favorite"];
            $array["user_gallery"] = $_SESSION["gallery"];
            $array["user_like"] = $_SESSION["like"];
            if(!empty($_FILES["fileNew"]["name"])){
                array_unshift($array["user_gallery"], $_FILES["fileNew"]["name"]);
                $data = $user->update_user($array, $id);
                if($data){
                //saving file imgs
                    $archivo = $_FILES['fileNew']['name'];
                    if (isset($archivo) && $archivo != ""){
                        $type = $_FILES['fileNew']['type'];
                        $size = $_FILES['fileNew']['size'];
                        $temp = $_FILES['fileNew']['tmp_name'];
                         if (!((strpos($type, "gif") || strpos($type, "jpeg") || strpos($type, "jpg") || strpos($type, "png")) && ($size < 2000000))){
                             $_SESSION["msg"] = "Only .gif, .jpg, .png files are allowed. and 200 kb maximum";
                             $_SESSION["msgClass"] = "has-text-danger";
                         }else{
                             if (move_uploaded_file($temp, 'views/img/'.$archivo)){
                                 chmod('views/images/'.$archivo, 0777);
                             }else{
                                 $_SESSION["msg"] = "Error uploading file";
                                 $_SESSION["msgClass"] = "has-text-danger";
                             }
                         }
                     }
                     $_SESSION["gallery"] = $array["user_gallery"];
                 }
                 $_SESSION["msg"] = "Data save success";
                 $_SESSION['msgClass'] = "has-text-success"; 
                 header("location:http://localhost/hello_pet/index.php?m=gallery");   

            }else{
                $_SESSION["msg"] = "Please insert file photo";
                $_SESSION['msgClass'] = "has-text-danger"; 
                header("location:http://localhost/hello_pet/index.php?m=gallery");
            }              
        }
        if(!empty($_POST["gallery_delete"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
            if(!empty($_POST["dataDel"])){
                $dataDelete = $_POST["gallery_delete"];               
            }
            $id = $_SESSION["id"];
            $array["user_name"] = $_SESSION["name"];
            $array["user_email"] = $_SESSION["email"];
            $array["user_breed"] = $_SESSION["breed"];
            $array["user_city"] = $_SESSION["city"];
            $array["user_gender"] = $_SESSION["gender"];
            $array["user_img"] = $_SESSION["img"];
            $array["user_favorite"] = $_SESSION["favorite"];
            $array["user_like"] = $_SESSION["like"];
            $array["user_gallery"] = $user->delete_data_gallery($dataDelete);
            $data = $user->update_user($array, $id);
            $_SESSION["datadelete"] = $dataDelete; 
            $_SESSION["msg"] = "photo deleted";
            $_SESSION['msgClass'] = "has-text-success"; 
            header("location:http://localhost/hello_pet/index.php?m=gallery"); 
        }
    }
    //update data user 
    static function update(){
        $user = new User();
        if(!empty($_POST["edit_save"])){
            $id = $user->clean_string($_POST["id"]);
            $array["user_name"] = $user->clean_string(ucfirst(strtolower($_POST["name"])));
            $array["user_email"] = $user->clean_string(strtolower($_POST["email"]));
            $array["user_breed"] = $user->clean_string($_POST["breed"]);
            $array["user_city"] = $user->clean_string(ucfirst(strtolower($_POST["city"])));
            $array["user_gender"] = $user->clean_string(ucfirst(strtolower($_POST["gender"])));
            if(!empty($_FILES["file"]["name"])){
                $array["user_img"] = $_FILES["file"]["name"];
            }else{
                $array["user_img"] = $_POST["editImgUser"];
            }
            $array["user_favorite"] = $_SESSION["edit_favorite"];
            $array["user_gallery"] = $_SESSION["edit_gallery"];
            $array["user_like"] = $_SESSION["edit_like"];            
            $data = $user->update_user($array, $id);
            //saving file imgs
            if($data){
                $archivo = $_FILES['file']['name'];
                if (isset($archivo) && $archivo != ""){
                    $type = $_FILES['file']['type'];
                    $size = $_FILES['file']['size'];
                    $temp = $_FILES['file']['tmp_name'];
                    if (!((strpos($type, "gif") || strpos($type, "jpeg") || strpos($type, "jpg") || strpos($type, "png")) && ($size < 2000000))){
                        $_SESSION["msg"] = "Only .gif, .jpg, .png files are allowed. and 200 kb maximum";
                        $_SESSION["msgClass"] = "has-text-danger";
                    }else{
                        if (move_uploaded_file($temp, 'views/img/'.$archivo)){
                            chmod('views/images/'.$archivo, 0777);
                        }else{
                            $_SESSION["msg"] = "Error uploading file";
                            $_SESSION["msgClass"] = "has-text-danger";
                        }
                    }
                }
            }           
            header("location:http://localhost/hello_pet/index.php?m=admin"); 
        }
    }
    //delete data user 
    static function delete(){
        $id = $_REQUEST["id"];
        $user = new User();
        $data = $user->delete_user($id);
        header("location:http://localhost/hello_pet/index.php?m=admin"); 
    }   
    //logout user
    static function logout(){
        $_SESSION["login"] = null;
        session_unset(); 
        $_SESSION=[];
        session_destroy();
        require_once("views/index.php");
    }  
}
?>
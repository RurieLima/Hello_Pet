<?php  
session_start();
require_once("models/index.php");

//CLASS ADMIN
class userController{
    private $model;
    public function __construct(){
        $this->model = new User();
    }
    //show home page
    static function index(){
        require_once("views/index.php");
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
                $data = $user->user_login($email);
                if($data){
                    $_SESSION["email"] = $email;
                    $_SESSION["name"] = $data["user_name"];
                    $_SESSION["city"] = $data["user_city"];
                    $_SESSION["breed"] = $data["user_breed"];
                    $_SESSION["gender"] = $data["user_gender"];
                    $_SESSION["img"] = $data["user_img"];
                    $_SESSION["login"] = "login_true";
                    $allData = $user->get_users();
                    require_once("views/dash.php");                             
                }else{
                    $_SESSION["msg"] = "Not accessible";
                    header("location:http://localhost/hello_pet/index.php");
                }                        
            }else{
                $_SESSION["msg"] = "Please fill in user email and user name";
                header("location:http://localhost/hello_pet/index.php");
            }
        }
     }
    //show view profile
    static function profile(){
        $user = new User();
        $data = $user->get_users();
        require_once("views/profile.php");
    }
    //show view register
    static function register(){
        $user = new User();
        $data = $user->get_users();
        require_once("views/register.php");
    }
}
?>
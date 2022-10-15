<?php
define('url_base', '//'.$_SERVER['SERVER_NAME'].'/prueba/');

class LoginUser {
    // class properties
    private $username;
    private $password;
    private $storage = "data/users.json";
    private $stored_users;

    //Class methods
    public function __construct($username,$password)
    {
        $this->username = $username;
        $this->password = $password;
        $this->stored_users = json_decode(file_get_contents($this->storage),true);
        $this->login();
    }

    
    private function login(){
        foreach ($this->stored_users as $user) {
            if ($user['username'] == $this->username) {
                if(password_verify($this->password, $user['password'])){
                    session_start();
                    $_SESSION['user'] = $this->username;
                    header("location:". url_base."account.php"); exit();
                }
            }
        }
        echo "Wrong username or password";
    }
}
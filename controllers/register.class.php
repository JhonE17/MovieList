<?php
include_once('helpers/redirect.php');

class RegisterUser
{
    // Class properties
    private $username;
    private $phone;
    private $email;
    private $raw_password;
    private $encrypted_password;
    private $storage = "data/users.json";
    private $stored_users =[];
    private $new_user;

    public function __construct($username, $phone, $email, $password)
    {
        $this->username =  preg_replace('/[^a-zA-Z]/', '',$username);
        $this->phone = filter_var(trim($phone));
        $this->email = filter_var(trim($email), FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
        $this->raw_password = $password;
        $this->encrypted_password = password_hash($this->raw_password, PASSWORD_DEFAULT);

        $this->stored_users = json_decode(file_get_contents($this->storage), true);

        $this->new_user = [
            "username" => $this->username,
            "phone" => $this->phone,
            "email" => $this->email,
            "password" => $this->encrypted_password
        ];
        if ($this->checkFieldValued()) {
            $this->insertUser();
        }
    }
    private function checkFieldValued()
    {
            if (preg_match("/[a-zA-Z]+\S+/",$this->username)){
                return true;
            }else{
                echo 'Username is invalid';
                return false;
            }
            if (preg_match("/^(\+|[1-9])?[-]*([0-9][-]*){9}/",$this->phone)) {
                return true;
            }else{
                echo 'Phone is invalid';
                return false;
            }
            if (preg_match("/^([A-Z|a-z|0-9](\.|_){0,1})+[A-Z|a-z|0-9]\@([A-Z|a-z|0-9])+((\.){0,1}[A-Z|a-z|0-9]){3}\.[a-z]{2,3}$/", $this->email)){ 
                return true;
            }else{
                echo 'Email is invalid';
                return false;
            }
            if(preg_match("/^(?=(?:.*\d))(?=.*[A-Z])(?=.*[a-z])(?=.*[-.*])\S{6,24}$/", $this->raw_password)){
                return true;
            }else{
                echo 'Password is invalid';
                return false;
            }
            echo $this->raw_password;
    }
    private function usernameExists()
    {
        foreach ($this->stored_users as $user) {
            if ($this->username == $user["username"] || $this->email == $user["email"]) {
                echo "Username already taken, please choose a different one.";
                return true;
            }
        }
        return false;
    }

    private function insertUser()
    {
        if ($this->usernameExists() == FALSE) {
            array_push($this->stored_users, $this->new_user);
            if (file_put_contents($this->storage, json_encode($this->stored_users, JSON_PRETTY_PRINT))) {
                header("location:" . url_base . "index.php"); exit();
                echo "You registration was successful";
            } else {
                echo "Something went wrong, please try again";
            }
        }
    }
}

<?php
require_once "./config/confin_db.php";

//create class of user 
class User
{
    public $first_name;
    public $last_name;
    public $phone_number;
    public $email;

    function __construct($first_name = null, $last_name = null, $phone_number = null, $email = null)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->phone_number = $phone_number;
        $this->email = $email;
        echo "Saving data ..." . "\n";
    }

    public function getAllInfo()
    {
        $info = [
            "firstName : " => $this->first_name,
            "lasttName : " => $this->last_name,
            "phoneNumber : " =>  $this->phone_number,
            "Email : " =>  $this->email
        ];
        // foreach ($info as $key => $value) {
        //     echo "$key" . "$value" . "\n";
        // }
    }
    public function setAllInfo($first_name, $last_name, $phone_number, $email)
    {
        if (empty($first_name) || empty($last_name) || empty($phone_number) || empty($email)) {
            throw new Exception("ERROR : all information is required");
        } else {
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->phone_number = $phone_number;
            $this->email = $email;
        }
    }
}

// // create instance from user class 
// $fakeUser = new User();
// $fakeUser->setAllInfo("Aziz", "Boujaada", "0650470776", "aziz12@gmail.com");
// $fakeUser->getAllInfo();

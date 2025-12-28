<?php 

class  Validator {
    public static $email_regex = "/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/";
    public static $name_regex = "/^[A-Za-z ]+$/";
    
    
    
    
    public static function emailValidation($email){


          $isValid = true;

          if (empty($email)) {
               echo "email is required";
               $isValid = false;
          } elseif (!preg_match(self::$email_regex, $email)) {
               echo "invalid email";
               $isValid = false;
          }

          return $isValid;
    }

    public static function nameValidation($first_name){

          $isValid = true;

          if (empty($first_name)) {
               echo "name is required";
               $isValid = false;
          } elseif (!preg_match(self::$name_regex, $first_name)) {
               echo "name must contain only letters";
               $isValid = false;
          }

          return $isValid;
    }
}
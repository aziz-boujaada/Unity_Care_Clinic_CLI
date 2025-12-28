<?php

class  Validator
{
    public static $email_regex = "/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/";
    public static $name_regex = "/^[A-Za-z ]+$/";
    public static $phone_regex = "/^[0-9+\-\s]+$/";


    public static function emailValidation($email)
    {


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

    public static function nameValidation($first_name)
    {

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


    

    public static function phoneValidation($phone)
    {

        $isValid = true;

        if (empty($phone)) {
            echo "phone number is required";
            $isValid = false;
        } elseif (!preg_match(self::$phone_regex, $phone)) {
            echo "invalid phone number";
            $isValid = false;
        }

        return $isValid;
    }

    public static function ageValidation($age)
    {

        $isValid = true;

        if (empty($age)) {
            echo "age is required";
            $isValid = false;
        } elseif (!is_numeric($age)) {
            echo "age must be a number";
            $isValid = false;
        }

        return $isValid;
    }

     public static function genderValidation($gender)
    {

        $isValid = true;

        if (empty($gender)) {
            echo "email is required";
            $isValid = false;
        } elseif ($gender !== "male" && $gender !== "female") {
            echo "ayou must be write a valid gender ( MALE or FEMALE )";
            $isValid = false;
        }


        return $isValid;
    }
}





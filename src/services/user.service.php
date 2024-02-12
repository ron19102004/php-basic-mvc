<?php
class UserService
{
    private static $instance = null;
    public static function getInstance()
    {
        if (self::$instance == null)
            self::$instance = new self();
        return self::$instance;
    }
    //----------------------------------------------------------------
    public function create($fullName, $email, $password)
    {
        User::save(
            User::TABLE,
            ['fullName', 'email', 'password'],
            [$fullName, $email, password_hash($password, PASSWORD_DEFAULT)]
        );
    }
}

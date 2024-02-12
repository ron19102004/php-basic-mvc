<?php
class UserController
{
    private static $instance = null;
    public static function getInstance()
    {
        if (self::$instance == null)
            self::$instance = new self();
        return self::$instance;
    }
    //----------------------------------------------------------------
    private $userService;
    public function __construct()
    {
        $this->userService = UserService::getInstance();
    }
    public function create()
    {
        try {
            $fullName = Helper::get_input('fullName');
            $email = Helper::get_input('email');
            $password = Helper::get_input('password');
            $this->userService->create($fullName, $email, $password);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
}

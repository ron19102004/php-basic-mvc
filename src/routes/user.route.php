<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'] . "/src/utils/import.util.php");
Import::configs('route.base.php');
Import::middleware('auth');
Import::middleware('role');
Import::controller('user');
Import::service('user');
Import::entity('user');

class UserRouter extends BaseRouter
{
    private $controller;
    public function __construct()
    {
        $this->controller = UserController::getInstance();
    }
    public function post()
    {
        switch ($this->method()) {
            case 'new': {
                    $this->controller->create();
                    Helper::redirect('../views/pages/page1.page.php');
                    break;
                }
        }
    }
    public function get()
    {
        switch ($this->method()) {
            case 'get-all': {
                    if (RoleMiddleware::guard(Role::ADMIN)) {
                        // TODO: handle function
                    }
                    break;
                }
        }
    }
}
(new UserRouter())->run();

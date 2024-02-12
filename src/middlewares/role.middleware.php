<?php
class Role
{
    const USER = 'user';
    const ADMIN = 'admin';
}
class RoleMiddleware
{
    public static function guard($role)
    {
        if (AuthMiddleware::guard() == false) {
            return false;
        }
        $userRole = htmlspecialchars($_SESSION['role']);
        if (isset($userRole) && $userRole == $role) {
            return true;
        }
        return false;
    }
}

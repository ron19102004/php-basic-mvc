<?php
class AuthMiddleware
{
    public static function guard()
    {
        if (isset($_SESSION['userCurrent']) == false) {
            return false;
        }
        return true;
    }
}

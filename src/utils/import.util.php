<?php
class Import
{
    public static function configs($fileName)
    {
        require($_SERVER['DOCUMENT_ROOT'] . "/src/configs/" . $fileName);
    }
    public static function controller($name)
    {
        require($_SERVER['DOCUMENT_ROOT'] . "/src/controllers/" . $name . ".controller.php");
    }
    public static function entity($name)
    {
        require($_SERVER['DOCUMENT_ROOT'] . "/src/entities/" . $name . ".entity.php");
    }
    public static function middleware($name)
    {
        require($_SERVER['DOCUMENT_ROOT'] . "/src/middlewares/" . $name . ".middleware.php");
    }
    public static function util($name)
    {
        require($_SERVER['DOCUMENT_ROOT'] . "/src/utils/" . $name . ".util.php");
    }
    public static function service($name)
    {
        require($_SERVER['DOCUMENT_ROOT'] . "/src/services/" . $name . ".service.php");
    }
    public static function route($name)
    {
        return  "/src/routes/" . $name . ".route.php";
    }
    public static function page($name)
    {
        require($_SERVER['DOCUMENT_ROOT'] . "/src/views/pages/" . $name . ".page.php");
    }
    public static function pageAd($name)
    {
        require($_SERVER['DOCUMENT_ROOT'] . "/src/views/pages/admin/" . $name . ".page.php");
    }
    public static function component($name)
    {
        require($_SERVER['DOCUMENT_ROOT'] . "/src/views/components/" . $name);
    }
    public static function layout($name)
    {
        require($_SERVER['DOCUMENT_ROOT'] . "/src/views/layouts/" . $name . ".layout.php");
    }
    public static function pageURL($name)
    {
        return "/src/views/pages/" . $name . ".page.php";
    }
    public static function pageAdURL($name)
    {
        return  "/src/views/pages/admin/" . $name . ".page.php";
    }
    public static function componentURL($name)
    {
        return  "/src/views/components/" . $name;
    }
    public static function layoutURL($name)
    {
        return "/src/views/layouts/" . $name . ".layout.php";
    }
    public static function urlActive($url)
    {
        if ($_SERVER['REQUEST_URI'] == $url) return true;
        return false;
    }
}

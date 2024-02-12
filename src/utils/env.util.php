<?php

 class Env
{
    public static function get($key)
    {
        $jsonData = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/env.json");
        $data = json_decode($jsonData, true);
        return $data[$key];
    }
}

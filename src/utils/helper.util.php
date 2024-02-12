<?php
class Helper
{
    public static function get_input($key)
    {
        $value =  null;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST[$key])) {
                $value =  filter_input(INPUT_POST, htmlspecialchars($key));
            }
        } else {
            if (isset($_GET[$key])) {
                $value =  filter_input(INPUT_GET, htmlspecialchars($key));
            }
        }
        if (is_null($value)) throw new Exception('Key not found');
        return $value;
    }
    public static function redirect($url)
    {
        header('Location: ' . $url);
    }
}

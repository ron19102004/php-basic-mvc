<?php
Import::util('helper');
abstract class BaseRouter
{
    abstract public function post();
    abstract public function get();
    public function run()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST")
            $this->post();
        else
            $this->get();
    }
    public function method()
    {
        return Helper::get_input('method');
    }
}

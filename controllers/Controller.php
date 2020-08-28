<?php

class Controller
{
    public function isPost()
    {
        if(isset($_POST) && count($_POST) > 0) {
            return true;
        }
        else {
            return false;
        }
    }
    
    public function redirect($path)
    {
        Header('Location: ' . $path);
    }
}
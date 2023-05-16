<?php
spl_autoload_register(function($class)
{
    if(file_exists("Config/app/".$class.".php"))
    {
        require_once "Config/app/". $class.".php";
    }
})

?>
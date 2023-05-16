<?php
    require_once "Config/config.php";

    //proteccion de la url
    $ruta=!empty($_GET['url']) ? $_GET['url'] : "Home/index";
    //delimitador
    $array=explode("/", $ruta);
    $controller =$array[0];
    $metodo ="index";
    $parametro="";
    //verificar si existe el metodo
    if(!empty($array[1]))
    {
        if(!empty($array[1]!=""))
        {
            $metodo=$array[1];
        }
    }
    //verificar el parametro
    if(!empty($array[2]))
    {
        if(!empty($array[2]!=""))
        {
            for($i=2;$i<count($array);$i++)
            {
                $parametro .=$array[$i].",";
            }
            $parametro=trim($parametro,",");
        }
    }
    require_once "Config/app/autoload.php";
    $dirControllers="Controllers/".$controller.".php";
    if(file_exists($dirControllers))
    {
        require_once $dirControllers;
        $controller = new $controller();
        if(method_exists($controller,$metodo))
        {
            $controller->$metodo($parametro);

        }else{
            echo "No existe el metodo";
        }
    }else{
    echo "No existe el controlador";
    }
?>

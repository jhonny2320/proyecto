<?php

class Controller{
  protected $views, $model;
     public function  __construct()
     {
        $this->views=new Views();
        $this->cargarModel();
     }
    //conectar controller con el modelo
  public function cargarModel()
  {
    //obtener el nombre de la clase de cada controlador
    $model = get_class($this)."Model";
    //ruta del modelo
    $ruta = "Models/".$model.".php";
    //exixte el archivo
    if (file_exists($ruta))
    {
        require_once $ruta;
        $this->model=new $model();
    }
  }  
}
?>
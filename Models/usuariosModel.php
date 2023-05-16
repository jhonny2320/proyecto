<?php

class usuariosModel extends Query
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getUsuario(string $usuario, string $clave)
    {
        $sql= "SELECT * FROM empleados where emp_usuario='$usuario' AND emp_contraseña='$clave'";
        $data=$this->select($sql);
        return $data;
        
    }
    public function getUsuarios()
    {
        $sql= "SELECT * FROM empleados";
        $data=$this->selectAll($sql);
        return $data;
        
    }
} 

?>
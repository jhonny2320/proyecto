<?php
class Usuarios extends Controller
{
    public function __construct()
    {
        session_start();
        parent::__construct();
    }
    public function index()
    {
        //print_r($this->model->getUsuario());
        $this->views->getView($this, "index");
    }
    public function listar()
    {
        $data =$this->model->getUsuarios();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function validar()
    {
        if(empty($_POST['usuario']) || empty($_POST['clave']))
        {
            $msg="los campos estan vacios";
        }else{
            $usuario=$_POST['usuario'];
            $clave=$_POST['clave'];
            $data = $this->model->getUsuario($usuario,$clave);
            //verificar si existe el ususario
            if($data)
            {
                $_SESSION['id_emp']=$data['emp_id'];
                $_SESSION['usuario']=$data['emp_usuario'];
                $_SESSION['nombre']=$data['emp_nombre'];
                $msg ="ok";
            }
            else{
            $msg="Credenciales Incorrectas";
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        //print_r($data);
        die();
    }
}
?>
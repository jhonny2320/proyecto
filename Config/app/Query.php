<?php
class Query extends Conexion
{
    //variables
    private $pdo,$con,$sql;

    public function __construct()
    {
        //instancia a pdo 
        $this->pdo=new Conexion();
        $this->con=$this->pdo->conect();

    }

    public function select(string $sql)
    {
        $this->sql=$sql;
        //acceder a la conexion y preparar una consulta
        $resul = $this->con->prepare($this->sql);
        //ejecutar la consulta
        $resul->execute();
        $data = $resul->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    public function selectAll(string $sql)
    {
        $this->sql=$sql;
        //acceder a la conexion y preparar una consulta
        $resul = $this->con->prepare($this->sql);
        //ejecutar la consulta
        $resul->execute();
        $data = $resul->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}
?>
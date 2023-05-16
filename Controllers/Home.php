<?php
class Home extends Controller
{
    public function index()
    {
        //mostrar la vista
        $this->views->getView($this, "index");
    }
    
}
?>
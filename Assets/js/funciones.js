let tblUsuarios;
document.addEventListener("DOMContentLoaded",function()
   {
    tblUsuarios = $('#tblUsuarios').DataTable({
        ajax: {
            url: base_url + "Usuarios/listar",
            dataSrc: ''
        },
        columns: [
            {'data' : 'emp_id'}, 
            {'data' : 'emp_nombre'},
            {'data' : 'emp_usuario'},
            {'data' : 'emp_acceso'}
        ]
    });
})
function frmLogin(e){

    e.preventDefault();
    session_start();
    const usuario=document.getElementById("usuario");
    const clave=document.getElementById("clave");
    //alertas cajas de texto en el login
    if(usuario.value=="")
    {
        //alerta  
        clave.classList.remove("is-invalid");
        usuario.classList.add("is-invalid");
        usuario.focus();
    
    }
    else if(clave.value=="")
    {
        clave.classList.add("is-invalid");
        usuario.classList.remove("is-invalid");
        clave.focus();
    }
    else
    {
        const url = base_url + "Usuarios/validar";
        //id del formulario
        const frm = document.getElementById("frmLogin");
        //si los campos estan diferentes de vacios
        const http=new XMLHttpRequest();
        http.open("POST",url,true);
        //enviar la peticion
        http.send(new FormData(frm));
        //verificar el estado
        Window.location= base_url + "Usuarios";
        http.onreadystatechange = function()
        {
            if(this.readyState>=4 && this.status<=200)
            {
                //console.log(this.responseText);
                const res=JSON.parse(this.responseText);
                if(res == "ok")
                {
                    console.log(this.responseText);
                    Window.location= base_url + "Usuarios";
                }
                else{
                    document.getElementById("alerta").classList.remove("d.none");
                    document.getElementById("alerta").innerHTML=res;
                }
            }
        }
    }
}
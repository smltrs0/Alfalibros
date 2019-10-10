<?php 

if (isset($_POST['clave']) && isset($_POST['email'])) {
 include_once '../classes/Autenticacion.php';
 $usuario = new Autenticacion();
 $clave=$_POST['clave'];
 $email = $_POST['email'];
 // Aqui falta aplicar filtros o los hace el PDO?
  $usuario = $usuario->get_usuario($clave,$email);
  if (!empty($usuario) && $usuario['usuario_tipo']>0 ) 
    {
      // Ya que se  inicio session almacenamos los datos de la persona que la inicio
       session_start();
             $_SESSION['id'] = $usuario['id']; 
              $_SESSION['nombre'] = $usuario['nombre'];
              $_SESSION['apellido'] = $usuario['apellido'];
              $_SESSION['email'] = $usuario['email'];
               $_SESSION['image'] = $usuario['image'];
              $_SESSION['cargo'] = $usuario['usuario_tipo'];
              // Esta es la redireccion 
         echo "dashboard_test.php";
         // Ahora el trabajo le queda al script de php de cada pagina ver si el usuario esta
         // logueado y si tiene permisos de ver esa pagina

    }
    elseif (!empty($usuario) && $usuario['usuario_tipo']==0) 
    {
      echo "error_1";
    }
    else
    {
    // header("location:../login.php");
      echo "error_2";
    }
}else{
    echo "<script>alert('LOS CAMPOS NO PUEDEN ESTAR VACIOS');</script>";
    echo '<script>window.location.href = "../login.php"</script>';

}




 ?>
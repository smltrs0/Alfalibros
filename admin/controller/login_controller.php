<?php 

if (isset($_POST['email']) && isset($_POST['clave'])) {
    $email = $_POST['email'];
    $clave= $_POST['clave'];
    require_once('../config.path.php');
    require_once(TOOLS.'db_connector.php');
    require_once(TOOLS.'get.php');

    $usuario = get::get_user($email,$clave);
    echo"<pre>";
    print_r($usuario);
  if (!empty($usuario) && $usuario['cargo']>0 ) 
    {
      // Ya que se  inicio session almacenamos los datos de la persona que la inicio
       session_start();
             $_SESSION['id'] = $usuario['id']; 
              $_SESSION['nombre'] = $usuario['nombre'];
              $_SESSION['username'] = $usuario['username'];
              $_SESSION['apellido'] = $usuario['apellido'];
              $_SESSION['email'] = $usuario['email'];
               $_SESSION['image'] = $usuario['image'];
              $_SESSION['cargo'] = $usuario['cargo'];
              // Esta es la redireccion 
         header("location:../index.php");

    }
    elseif (!empty($usuario) && $usuario['cargo']==0) 
    {
      echo "<script>
      alert('Tu usuario no esta activo, si crees que esto es un error pornte en contacto con el administrador del sistema');
      </script>";
    }
    else
    {
    // header("location:../login.php");
      echo "Credenciales no validas</br>El nombre de usuario o contraseña no son correctos";
    }
}else{
    echo "<script>alert('LOS CAMPOS NO PUEDEN ESTAR VACIOS');</script>";
    //echo '<script>window.location.href = "../login.php"</script>';

}


 ?>
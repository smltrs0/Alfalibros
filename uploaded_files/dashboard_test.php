<?php 
  // ESTE ES EL CODIGO QUE SE VA A ENCARGAR DE VALIDAR QUE EL USUARIO ESTE REGISTRADO
	// Siempre que trabajemos con sessiones hay que hacer session_start() "SIEMPRE, SIEMPRE"!
  // Se prendio esta mrd :v
	session_start();
  echo session_id()."</br>";
  // Validamos que la variable session cargo esta definida y su valor es mayor que 0
  if(isset($_SESSION['cargo']) && $_SESSION['cargo'] > 0)
  {   
    echo $_SESSION['nombre'];
    echo $_SESSION['apellido'];
    echo $_SESSION['email'];
    $img = $_SESSION['image'];
    if (!empty($img)) 
    {
      echo "<img height='240px' src=uploaded_files/users/".$img.">";
    } 
    else 
    {
      echo "sim foto de perfil";
    }
    echo "<a href='controller/desconectar.php'>Desconectar</a></br>";
  

    if ($_SESSION['cargo'] == 1) {
      echo "Usuario";
    }elseif ($_SESSION['cargo'] == 2) {
      echo "Administrador";
    }
  }
  else
  {
    // Aqui redireccionamos ya que el usuario no esta logueado
    echo "session no iniciada";
   // header("location:login.php");
  }

 ?>
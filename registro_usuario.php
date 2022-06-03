<?php

    include 'db.php';

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$usuario = $_POST['usuario'];
$password = $_POST['password'];
$role = 0;
$id = rand(0,100000);
$query = "INSERT INTO usuarios (nombre, email, usuario, password, role,ID_user,Status) 
    VALUES ('$nombre', '$email', '$usuario', '$password',$role,$id,1)";

$saving = "INSERT INTO savings(ID_owner,Balance) VALUES ('$id',100)";

    //verificar que el correo no se repita en la base de datos

    $verificarCorreo = mysqli_query($conexion,"SELECT * FROM usuarios WHERE email = '$email'");
    $verificarUsuario = mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario = '$usuario'");

    if (mysqli_num_rows($verificarCorreo) > 0){

        echo '
            <script>
                alert("this email is already registered, try with other email account");)
                window.location = ".../cyberwarrior/index.php";
            </script>
        ';
        exit();

    }
    if (mysqli_num_rows($verificarUsuario) > 0){

        echo '
            <script>
                alert("The username is already registered, try with other username");)
                window.location = ".../cyberwarrior/index.php";
            </script>
        ';
        exit();
    }
    

    $ejecutar = mysqli_query($conexion,$query);

    if($ejecutar){
        echo '
            <script>
                alert("the user has been registered successfully");
                window.location = "../solution/index.html";
            </script>
        
        ';
    }else{
        echo '
            <script>
                alert("Oh no, something went wrong, try again");
                window.location = "../cyberwarrior/index.php";
            </script>
        
        ';

    }

    mysqli_close($conexion);
?>
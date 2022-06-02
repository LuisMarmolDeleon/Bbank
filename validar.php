<?php

$email = $_POST["email"];
$password = $_POST["password"];
$role = $_POST["role"];
session_start();


include('db.php');

$consulta = "SELECT * FROM usuarios where email = '$email' and password = '$password'";
$resultado =mysqli_query($conexion,$consulta);

$row = mysqli_fetch_array($resultado);
$role = $row['role'];
$filas= mysqli_num_rows($resultado);

if($filas > 0){
    $_SESSION['usuario'] = $email;
    if ($role==0) {
        header("Location: admin/home.php");
    }else{
        header("Location: admin/admin.php");
    }
    exit();
}else{

    echo '
        
            <script>
                alert("The email or password is incorrect");
                window.location = "../index.php";
            </script>
        ';
    exit();
}
mysqli_free_result($resultado);
mysqli_close($conexion);
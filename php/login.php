<?php
    session_start();
    include 'db.php';

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $user = $_POST['username'];
        $pass = $_POST['password'];

        $sql = "SELECT * FROM usuarios where usuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            if (password_verify($pass, $row['password'])) {
                // Guardar datos en la sesión
                $_SESSION['id'] = $row['id'];
                $_SESSION['usuario'] = $row['usuario'];

                echo $_SESSION['id'];
                echo $_SESSION['usuario'];
                echo $row['id'];
                echo $row['usuario'];
    
                // Redirigir a la página de éxito
                header("Location: ../html/inicio.html");
                exit();
            } else {
                echo "Contraseña incorrecta.";
            }
        }else{
            echo "Usuario no encontrado.";
        }
    }else{
        echo "Método no permitido.";
    }

    $conn->close();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Log in</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
        <link rel="stylesheet" href="../fontawesome/css/all.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="icon" href="../icons/circle-nodes-solid.svg" type="image/x-icon">
    </head>
    <body>
      <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
          <a class="navbar-item">
            
            <i class="fa-solid fa-circle-nodes fa-fade fa-2x"></i>
            <h1>Notebook</h1>
          </a>
        </div>
      </nav>
      <hr class="hrNav">
        <div class="box">

          <form action="" method="POST">
        
          <div class="field">
            <p class="control has-icons-left">
              <input class="input" type="text" placeholder="Username" id="username" name="username">
              <span class="icon is-small is-left">
                <i class="fas fa-user"></i>
              </span>
            </p>
          </div>
          <div class="field">
            <p class="control has-icons-left">
              <input class="input" type="password" placeholder="Password" id="password" name="password">
              <span class="icon is-small is-left">
                <i class="fas fa-lock"></i>
              </span>
            </p>
          </div>
          <div class="field">
            <p class="control">
              <input class="button is-success" id="btnLogin" name="btnLogin" type="submit" value="Login"></input>
            </p>
          </div>

        </form>
        </div>

        
    </body>
</html>
<?php
require 'config/config.php';
require 'config/database.php';
$db=new database();
$con = $db->conectar();

$ID = isset($_GET['id_producto']) ? $_GET['id_producto'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

if($ID == '' || $token == ''){

    echo 'error';
    exit;

} else{

    $token_tmp = hash_hmac('sha1', $id_producto, KEY_TOKEN);

    if($token==$token_tmp){

        $sql =$con ->prepare("SELECT count(id) from productos where id=? and stock=1");
        $sql->execute([$id]);
        if($sql->fetchColumn() > 0) {
            $sql =$con ->prepare("SELECT id_producto, nombre_producto, id_categoria, precio, color from productos where id=? and stock=1 LIMIT 1");
            $sql->execute([$id]);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $precio = $row['precio'];
            $precio = $row['precio'];
            $precio = $row['precio'];
            $precio = $row['precio'];
        }       

    }else{

        echo 'error';
        exit;
    }
}

$sql =$con ->prepare("SELECT id_producto, nombre_producto, id_categoria, precio, color from productos where stock=1");
$sql->execute();
$resultado = $sql->fetchALL(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Corporacion Inzeus</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<header>
  <!--<div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">CORPORACION INZEUS E.I.R.L</h4>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Contact</h4>
          <ul class="list-unstyled">
            <li><a href="https://wa.me/51925663672">WhatsApp</a></li>
            <li><a href="https://m.me/Corporacion Inzeus EIRL">Facebook</a></li>
            <li><a href="mailto:corporacion_zeus@hotmail.com">E-mail</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>-->
  <div class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a href="#" class="navbar-brand">
        <strong>Tienda online</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarHeader">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a href="#" class="nav-link active">contactenos</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">nuestros clientes</a>
            </li>
        </ul>
    </div>       
      
    </div>
    <a href="carrito.php" class="btn btn-primary">Carrito</a>
  </div>
</header>
    <main>
        <div class="container">            
            
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
         <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
            </a>
            <span class="text-muted">&copy; 2024, Corporacion Inzeus</span>
    </div>
  </footer>
</div>
</body>
</html>
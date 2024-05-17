<?php
class database{
    var $hostname = "localhost";
    var $database = "tiendav";
    var $username = "root";
    var $password = "";
    var $charset = "utf8";


    function conectar(){
        try{
        $conexion = "mysql:host=" . $this->hostname . "; dbname=" . $this->database . "; charset=" . $this->charset;
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => FALSE
        ];

        $pdo = new PDO($conexion, $this->username, $this->password, $options);

        return $pdo;
    } catch(PDOexception $e) {
        echo 'error conexion: ' . $e->getMessage();
        exit;
    }
    
    }
}
?>

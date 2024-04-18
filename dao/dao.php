<?php
    //libreria con acceso
    //a la base de datos
    /* $host = "127.0.0.1";
    $user = "root";
    $pswd = "root";
    $db = "nw201402";
    
    $conn = new mysqli($host, $user, $pswd, $db); */

    define("DB_HOST", $_ENV["MYSQL_DATABASE_SERVICE"]);
    define("DB_USER", $_ENV["MYSQL_USER"]);
    define("DB_PASSWORD", $_ENV["MYSQL_PASSWORD"]);
    define("DB_NAME", $_ENV["MYSQL_DATABASE"]);
                   
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD);
    $conn->select_db(DB_NAME);
    
    if ($conn->connect_error) {
        die ("Fallo la conexion: ".$conn -> connect_error);
    }
    
    $conn->set_charset('utf8');
    
    function obtenerRegistros(&$conn, $sqlstr){
        $resultado = array();
        if($conn){
            $cursor = $conn->query($sqlstr);
            if($cursor){
                foreach($cursor as $registro){
                    $resultado[] = $registro;
                }
            }
        }
        return $resultado;
    }
    function obtenerRegistro(&$conn, $sqlstr){
        $resultado = array();
        if($conn){
            $cursor = $conn->query($sqlstr);
            if($cursor){
                foreach($cursor as $registro){
                    $resultado = $registro;
                    break;
                }
            }
        }
        return $resultado;
    }
    
    function ejecutarNoQuery(&$conn, $sqlstr){
        if($conn){
            //Cuando son updates o Inserts devuelve false si falla el query.
            return $conn->query($sqlstr);
        }
        return false;
    }
    
    function obtenerUltimoID(&$conn){
        return $conn->insert_id;
    }
?>
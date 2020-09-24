<?php

include "conexion.php";

function mysqlCleaner($data)
{
    // FUNCION PARA EVITAR LOS ATAQUES A LA BASE DE DATOS
    global $db;
    $data = mysqli_real_escape_string($db, $data);
    $data = stripslashes($data);
    return $data;
}

if (isset($_POST['cerrarSesion']) == 1) {
    session_destroy(); // para destruir la sesion
    header("Refresh:0"); // para recargar la pagina
}

if (!empty($_POST['usuario']) && !empty($_POST['clave'])) {
    $usuario = mysqlCleaner($_POST['usuario']);
    $clave = mysqlCleaner($_POST['clave']);
    iniciarSesion($usuario, $clave);
}

if (!empty($_POST['id_plato_actualizar'])) {

    $imgurl = mysqlCleaner($_POST['imgurl']);
    $nombre_plato = mysqlCleaner($_POST['nombre_plato']);
    $valor = mysqlCleaner($_POST['valor']);
    $descripcion = mysqlCleaner($_POST['descripcion']);
    $id_plato = mysqlCleaner($_POST['id_plato_actualizar']);
    $activo = $_POST['activo'];

    actualizarInformacion($imgurl,
        $nombre_plato,
        $valor,
        $descripcion,
        $id_plato, $activo);
}

if (!empty($_POST['id_plato_eliminar'])) {
    $id_plato_eliminar = mysqlCleaner($_POST['id_plato_eliminar']);

    eliminarInformacion($id_plato_eliminar);
}

function listarCategorias()
{
    global $db;
    $sql = "SELECT id, nombre, descripcion FROM tbl_categoria WHERE 1";
    if ($resultado = $db->query($sql)) {
        while ($categoria = $resultado->fetch_assoc()) {?>
            <li class="nav-item">
                <a class="nav-link" href="#"><?php echo $categoria['nombre']; ?></a>
            </li>
        <?php }
    } else {?>
        <li class="nav-item">
           NO HAY CATEGORIAS ASOCIADAS
        </li>
   <?}
}

function listarPlatos()
{
    global $db;
    $sql = "SELECT
    a.id as id_plato, a.nombre as nombre_plato,a.imgurl,a.valor, a.descripcion as desc_plato, a.id_categoria,
    b.nombre as nombre_categoria
    FROM tbl_plato a INNER JOIN tbl_categoria b ON a.id = b.id
    WHERE 1 and a.activo = 1";
    if ($resultado = $db->query($sql)) {
        while ($platos = $resultado->fetch_assoc()) {
            include "./paginas/card.php";
        }
    }
}

function iniciarSesion($usuario, $clave)
{
    global $db, $msgAlert;

    $sql = "SELECT id, usuario,clave ,idrol FROM tbl_usuario WHERE usuario = '$usuario' AND clave = '$clave' LIMIT 1";

    if ($resultado = $db->query($sql)) {
        $rows = $resultado->num_rows;
        if ($rows > 0) {
            $nombreUsuario = "";

            while ($usuario = $resultado->fetch_assoc()) {
                $id_usuario = $usuario['id'];
                $nombreUsuario = $usuario['usuario'];
                $_SESSION["id_usuario"] = $id_usuario;
                $_SESSION["usuario"] = $nombreUsuario;
            }
        } else {
            $msgAlert = '<div class="alert alert-danger" role="alert">usuario o contraseña incorrectos.</div>';
        }

    } else {
        $msgAlert = '<div class="alert alert-danger" role="alert">usuario o contraseña incorrectos.</div>';
    }
}

function listarInformacion()
{
    global $db;
    $platosArray = [];

    $sql = "SELECT
    a.id as id_plato, a.nombre as nombre_plato,a.imgurl,a.valor, a.descripcion as desc_plato, a.id_categoria,
    b.nombre as nombre_categoria
    FROM tbl_plato a INNER JOIN tbl_categoria b ON a.id = b.id
    WHERE 1";

    if ($resultado = $db->query($sql)) {
        while ($platos = $resultado->fetch_assoc()) {
            $platosArray[] = $platos;
        }
    }

    include "./paginas/crud.php";
}

function actualizarInformacion($imgurl,
    $nombre_plato,
    $valor,
    $descripcion,
    $id_plato, $activo) {
    global $db, $msgAlert;

    if (empty($activo)) {
        $activo = 1;
    }

    $sql = "UPDATE tbl_plato SET nombre = '$nombre_plato', imgurl = '$imgurl', descripcion= '$descripcion', valor = '$valor', activo= '$activo' WHERE id = $id_plato";
    if ($resultado = $db->query($sql)) {
        $msgAlert = '<div class="alert alert-success" role="alert">Actualizado con exito.</div>';
    } else {
        $msgAlert = '<div class="alert alert-danger" role="alert">No actualizado, por favor revise la información.</div>';
    }
}

function eliminarInformacion($id_plato_eliminar)
{
    global $db, $msgAlert;

    $sql = "UPDATE tbl_plato SET activo = 2 WHERE id = $id_plato_eliminar ";
    if ($resultado = $db->query($sql)) {
        $msgAlert = '<div class="alert alert-success" role="alert">Eliminado con exito.</div>';
    } else {
        $msgAlert = '<div class="alert alert-danger" role="alert">No eliminado, por favor revise la información.</div>';
    }
}
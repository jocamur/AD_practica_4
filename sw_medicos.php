<?php
require 'Medicos.php';
// Permitimos todos los origenes para poder acceder desde el crud web
header('Access-Control-Allow-Origin: *');

switch ($_REQUEST['action']) {
    case 'get':
        // Obtenemos el contenido de la tabla
        $respuesta = Medicos::obtenerTabla();

        // Si el contenido existe
        if ($respuesta) {
            // Regresamos un JSON con el mensaje de exito, descripcion y los datos
            echo json_encode(
                array(
                    'success' => 'true',
                    'msg' => 'Lista de medicos.',
                    'data' => $respuesta
                )
            );
        } else {
            // Regresamos un JSON con el mensaje de fallo y descripcion
            echo json_encode(
                array(
                    'success' => 'false',
                    'msg' => 'Lista de medicos.',
                    'data' => ''
                )
            );
        }
        break;
    case 'insert':
        // Ejecutamos la operacion
        $id = $_REQUEST['id'];
        $numeroColegiado = $_REQUEST['numeroColegiado'];
        $dni = $_REQUEST['dni'];
        $nombre = $_REQUEST['nombre'];
        $apellido1 = $_REQUEST['apellido1'];
        $apellido2 = $_REQUEST['apellido2'];
        $telefono = $_REQUEST['telefono'];
        $sexo = $_REQUEST['sexo'];
        $idEspecialidad = $_REQUEST['idEspecialidad'];
        $idHorario = $_REQUEST['idHorario'];
        $idUser = $_REQUEST['idUser'];

        $respuesta = Medicos::agregar(
            $id,
            $numeroColegiado,
            $dni,
            $nombre,
            $apellido1,
            $apellido2,
            $telefono,
            $sexo,
            $idEspecialidad,
            $idHorario,
            $idUser
        );

        // Si la operacion fue exitosa
        if ($respuesta) {
            // Regresamos un JSON con el mensaje de exito y descripcion
            echo json_encode(
                array(
                    'success' => 'true',
                    'msg' => 'Elemento ' . $id . ' agregado'
                )
            );
        } else {
            // Regresamos un JSON con el mensaje de fallo y descripcion
            echo json_encode(
                array(
                    'success' => 'false',
                    'msg' => 'Fallo al agregar elemento ' . $id
                )
            );
        }
        break;
    case 'delete':
        // Ejecutamos la operacion
        $id = $_REQUEST['id'];
        $respuesta = Medicos::borrarElemento($id);

        // Si la operacion fue exitosa
        if ($respuesta) {
            // Regresamos un JSON con el mensaje de exito y descripcion
            echo json_encode(
                array(
                    'success' => 'true',
                    'msg' => 'Elemento ' . $id . ' eliminado'
                )
            );
        } else {
            // Regresamos un JSON con el mensaje de fallo y descripcion
            echo json_encode(
                array(
                    'success' => 'false',
                    'msg' => 'Fallo al eliminar elemento ' . $id
                )
            );
        }
        break;
    case 'update':
        // Ejecutamos la operacion
        $id = $_REQUEST['id'];
        $numeroColegiado = $_REQUEST['numeroColegiado'];
        $dni = $_REQUEST['dni'];
        $nombre = $_REQUEST['nombre'];
        $apellido1 = $_REQUEST['apellido1'];
        $apellido2 = $_REQUEST['apellido2'];
        $telefono = $_REQUEST['telefono'];
        $sexo = $_REQUEST['sexo'];
        $idEspecialidad = $_REQUEST['idEspecialidad'];
        $idHorario = $_REQUEST['idHorario'];
        $idUser = $_REQUEST['idUser'];

        $respuesta = Medicos::actualizar(
            $id,
            $numeroColegiado,
            $dni,
            $nombre,
            $apellido1,
            $apellido2,
            $telefono,
            $sexo,
            $idEspecialidad,
            $idHorario,
            $idUser
        );;

        // Si la operacion fue exitosa
        if ($respuesta) {
            // Regresamos un JSON con el mensaje de exito y descripcion
            echo json_encode(
                array(
                    'success' => 'true',
                    'msg' => 'Elemento ' . $id . ' actualizado'
                )
            );
        } else {
            // Regresamos un JSON con el mensaje de fallo y descripcion
            echo json_encode(
                array(
                    'success' => 'false',
                    'msg' => 'Fallo al actualizar elemento ' . $id
                )
            );
        }
        break;
}

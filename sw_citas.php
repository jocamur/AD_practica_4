<?php
require 'Citas.php';
// Permitimos todos los origenes para poder acceder desde el crud web
header('Access-Control-Allow-Origin: *');

switch ($_REQUEST['action']) {
    case 'get':
        // Obtenemos el contenido de la tabla
        $respuesta = Citas::obtenerTabla();

        // Si el contenido existe
        if ($respuesta) {
            // Regresamos un JSON con el mensaje de exito, descripcion y los datos
            echo json_encode(
                array(
                    'success' => 'true',
                    'msg' => 'Lista de citas.',
                    'data' => $respuesta
                )
            );
        } else {
            // Regresamos un JSON con el mensaje de fallo y descripcion
            echo json_encode(
                array(
                    'success' => 'false',
                    'msg' => 'Lista de citas.',
                    'data' => ''
                )
            );
        }
        break;
    case 'insert':
        // Ejecutamos la operacion
        $id = $_REQUEST['id'];
        $fecha = $_REQUEST['fecha'];
        $idMedico = $_REQUEST['idMedico'];
        $idEnfermero = $_REQUEST['idEnfermero'];
        $idPaciente = $_REQUEST['idPaciente'];

        $respuesta = Citas::agregar(
            $id,
            $fecha,
            $idMedico,
            $idEnfermero,
            $idPaciente
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
        $respuesta = Citas::borrarElemento($id);

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
        $fecha = $_REQUEST['fecha'];
        $idMedico = $_REQUEST['idMedico'];
        $idEnfermero = $_REQUEST['idEnfermero'];
        $idPaciente = $_REQUEST['idPaciente'];

        $respuesta = Citas::actualizar(
            $id,
            $fecha,
            $idMedico,
            $idEnfermero,
            $idPaciente
        );

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

<?php
require 'Pacientes.php';
// Permitimos todos los origenes para poder acceder desde el crud web
header('Access-Control-Allow-Origin: *');

switch ($_REQUEST['action']) {
    case 'get':
        // Obtenemos el contenido de la tabla
        $respuesta = Pacientes::obtenerTabla();

        // Si el contenido existe
        if ($respuesta) {
            // Regresamos un JSON con el mensaje de exito, descripcion y los datos
            echo json_encode(
                array(
                    'success' => 'true',
                    'msg' => 'Lista de pacientes.',
                    'data' => $respuesta
                )
            );
        } else {
            // Regresamos un JSON con el mensaje de fallo y descripcion
            echo json_encode(
                array(
                    'success' => 'false',
                    'msg' => 'Lista de pacientes.',
                    'data' => ''
                )
            );
        }
        break;
    case 'insert':
        // Ejecutamos la operacion
        $id = $_REQUEST['id'];
        $sip = $_REQUEST['sip'];
        $dni = $_REQUEST['dni'];
        $nombre = $_REQUEST['nombre'];
        $apellido1 = $_REQUEST['apellido1'];
        $apellido2 = $_REQUEST['apellido2'];
        $telefono = $_REQUEST['telefono'];
        $sexo = $_REQUEST['sexo'];
        $fechaNacimiento = $_REQUEST['fecha'];
        $localidad = $_REQUEST['localidad'];
        $calle = $_REQUEST['calle'];
        $numero = $_REQUEST['numero'];
        $puerta = $_REQUEST['puerta'];
        $piso = $_REQUEST['piso'];
        $idMedico = $_REQUEST['idMedico'];
        $idEnfermero = $_REQUEST['idEnfermero'];
        $idUser = $_REQUEST['idUser'];

        $respuesta = Pacientes::agregar(
            $id,
            $sip,
            $dni,
            $nombre,
            $apellido1,
            $apellido2,
            $telefono,
            $sexo,
            $fechaNacimiento,
            $localidad,
            $calle,
            $numero,
            $puerta,
            $piso,
            $idMedico,
            $idEnfermero,
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
        $respuesta = Pacientes::borrarElemento($id);

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
        $sip = $_REQUEST['sip'];
        $dni = $_REQUEST['dni'];
        $nombre = $_REQUEST['nombre'];
        $apellido1 = $_REQUEST['apellido1'];
        $apellido2 = $_REQUEST['apellido2'];
        $telefono = $_REQUEST['telefono'];
        $sexo = $_REQUEST['sexo'];
        $fechaNacimiento = $_REQUEST['fecha'];
        $localidad = $_REQUEST['localidad'];
        $calle = $_REQUEST['calle'];
        $numero = $_REQUEST['numero'];
        $puerta = $_REQUEST['puerta'];
        $piso = $_REQUEST['piso'];
        $idMedico = $_REQUEST['idMedico'];
        $idEnfermero = $_REQUEST['idEnfermero'];
        $idUser = $_REQUEST['idUser'];

        $respuesta = Pacientes::actualizar(
            $id,
            $sip,
            $dni,
            $nombre,
            $apellido1,
            $apellido2,
            $telefono,
            $sexo,
            $fechaNacimiento,
            $localidad,
            $calle,
            $numero,
            $puerta,
            $piso,
            $idMedico,
            $idEnfermero,
            $idUser
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
